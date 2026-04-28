<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * INDEX — GET /api/services
     * Returns a list of all services from the database
     */
    public function index()
    {
        $services = Service::latest('id')->get();
        return response()->json([
            'success' => true,
            'message' => "Service fetched successfully!",
            'data' => $services,
        ], 200);
    }

    /**
     * STORE — POST /api/services
     * Validates and saves a new service
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Create a new service record in the database
        $service = Service::create($validated);

        // Return the created service with 201 Created status
        return response()->json([
            'success' => true,
            'message' => "Service created successfully!",
            'data' => $service,
        ], 201);
    }

    /**
     * UPDATE — PUT /api/services/{id}
     * Validates and updates an existing service
     */
    public function update(Request $request, int $id)
    {
        // Find the service by its ID, or return 404 if not found
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => "Service not found!",
            ], 404);
        }

        // Validate the incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Update the service with new data
        $service->update($validated);

        // Return the updated service
        return response()->json([
            'success' => true,
            'message' => "Service updated successfully!",
            'data' => $service,
        ], 200);
    }

     /**
     * DESTROY — DELETE /api/services/{id}
     * Deletes a service by ID
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => "Service not found!",
            ], 404);
        }

        // Delete it
        $service->delete();

        // Return a success message
        return response()->json([
            'success' => true,
            'message' => "Service deleted successfully!",
        ], 200);
    }
}

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
        return response()->json($services);
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
}

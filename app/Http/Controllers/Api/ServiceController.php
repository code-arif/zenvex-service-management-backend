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
}

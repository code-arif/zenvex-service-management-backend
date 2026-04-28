<?php

use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Health check
 */
Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'time' => now(),
    ]);
});


/*
 * Service CRUD Routes
 */
Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('/store', [ServiceController::class, 'store']);
});

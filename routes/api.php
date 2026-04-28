<?php

use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*
 * Service CRUD Routes
 */
Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index']);
});

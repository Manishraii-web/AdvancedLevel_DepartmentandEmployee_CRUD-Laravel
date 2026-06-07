<?php

use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\Admin\AdminApiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.logger'])->group(function () {

Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum', 'abilities:employee')->group(function () {
    Route::apiResource('/employees', EmployeeApiController::class);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

Route::prefix('admin')->group(function () {

    Route::post('/login', [AdminApiController::class, 'login']);

    Route::middleware('auth:sanctum','abilities:admin')->group(function () {
        Route::get('/profile', function (Request $request) {
            return $request->user();

        });
    });
});


});

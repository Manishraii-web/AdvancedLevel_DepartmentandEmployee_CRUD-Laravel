<?php

use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

Route::get('/test', function(){
    return response()->json([
        'success'=> true,
        'message'=> 'API is working fine'
    ]);

});

Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum')->group(function(){
   Route::apiResource('/employees',EmployeeApiController::class);

});


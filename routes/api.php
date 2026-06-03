<?php

use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;



Route::get('/test', function(){
    return response()->json([
        'success'=> true,
        'message'=> 'API is working fine'
    ]);

});

 Route::get('/employees', [EmployeeApiController::class,'index']);

Route::apiResource('/employees',EmployeeApiController::class);

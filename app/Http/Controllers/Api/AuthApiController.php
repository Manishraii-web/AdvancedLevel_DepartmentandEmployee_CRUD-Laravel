<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmployeeLoginRequest;
use App\Http\Resources\EmployeeResource\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class AuthApiController extends Controller
{
   public function login(EmployeeLoginRequest $request){

   $credentials = $request->validated();

   if(!Auth::guard('employee')->attempt($credentials)){
    return response()->json([
        'success' => false,
        'message' => 'Invalid credentials'
    ], 401);
   }

   $employee = Auth::guard('employee')->user();

   $token =   $employee->createToken('employee-api-token')->plainTextToken;

   return response()->json([
    'success' => true,
    'message' => 'Login successful',
    'token' => $token,
    'employee' => new EmployeeResource($employee)
   ]);

   }
}

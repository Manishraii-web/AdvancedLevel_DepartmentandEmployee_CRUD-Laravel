<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class AuthApiController extends Controller
{
   public function login(Request $request){

   $credentials = $request->validate([
    'email'=> 'required|email',
    'password' => 'required'
   ]);
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
    'employee' => $employee
   ]);

   }
}

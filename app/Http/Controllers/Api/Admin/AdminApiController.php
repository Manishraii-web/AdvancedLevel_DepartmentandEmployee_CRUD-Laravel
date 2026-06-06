<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Services\Admin\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminApiController extends Controller
{
   public function login(LoginRequest $request){
    $credentials = $request->validated();

       $admin= Admin::where('email', $credentials['email'])->first();
       if(!$admin || !Hash::check($credentials['password'], $admin->password)){
        return response()->json([
            'message'=> 'Invalid Credentails'
        ], 401);
       }


    $token = $admin->createToken('admin-api-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'admin' => $admin
    ]);

   }

}

<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AdminResource\AdminResource;
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


    $token = $admin->createToken('admin-api-token',['admin'])->plainTextToken;

    return response()->json([
        'success' => true,
        'token' => $token,
        'admin' => new AdminResource($admin)
    ]);

   }

}

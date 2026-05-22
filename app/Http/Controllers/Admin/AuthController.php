<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\Admin\AuthService;


class AuthController extends Controller
{
    public function __construct(protected AuthService $authService){}

    public function showLogin(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if($this->authService->login($credentials)){
            return redirect()->route('admin.dashboardi');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);

    }

    public function register(RegisterRequest $request){
        $this->authService->register($request->validated());
        return redirect()->route('admin.login');

    }

    public function showRegister()
{
    return view('auth.register');
}

    public function logout(){
        $this->authService->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }




}



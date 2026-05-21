<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmployeeLoginRequest;
use App\Http\Requests\Auth\EmployeeRegisterRequest;
use App\Models\Employee;
use App\Services\Admin\AuthService;
use App\Services\Employee\AuthSerivce;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}
//-------------------------------------------------------------------------------------------
    public function showLogin()
    {
        return view('employee-auth.login');
    }
//---------------------------------------------------------------------------------------------
    public function showRegister()
    {
        return view('employee-auth.register');
    }
//----------------------------------------------------------------------------------------------
    public function register(EmployeeRegisterRequest $request)
    {
        $this->authService->register($request->validated());
        return redirect()->route('employee.login')->with('success', 'Login succccesffull');
    }
//------------------------------------------------------------------------------------------------
    public function login(EmployeeLoginRequest $request){
        $employee = Employee::where('email', $request->email)->first();

        if ($employee && !$employee->is_approved) {
            return back()->withErrors(['email' => 'Waiting for admin approval first']);
        }

        $credentials = $request->only('email', 'password');

        if ($this->authService->login($credentials)) {
            return redirect()->route('admin.dashboardi');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    //------------------------------------------------------------------------------------------
    public function logout(){
        $this->authService->logout();
        return redirect('employee.login');
    }
}

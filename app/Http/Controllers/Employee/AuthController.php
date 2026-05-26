<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Models\Department;
use App\Models\Employee;

use App\Services\Employee\AuthService;

use App\Http\Requests\Auth\EmployeeLoginRequest;
use App\Http\Requests\Auth\EmployeeRegisterRequest;
use App\Services\Department\DepartmentService;

class AuthController extends Controller
{
    protected AuthService $authService;
    protected DepartmentService $department;

    public function __construct(
        AuthService $authService, DepartmentService $department
    ) {
        $this->authService = $authService;
        $this->department = $department;
    }

    /**
     * Login Page
     */
    public function showLogin()
    {
        return view('employee-auth.login');
    }

    /**
     * Register Page
     */
    public function showRegister()
    {
        $this->department->getAll();

        return view(
            'employee-auth.register',
            compact('departments')
        );
    }

    /**
     * Register Employee
     */
    public function register(
        EmployeeRegisterRequest $request
    ) {

        $this->authService->register(
            $request->validated()
        );

        return redirect()
            ->route('employee.login')
            ->with(
                'success',
                'Registration submitted. Wait for admin approval.'
            );
    }

    /**
     * Login Employee
     */
    public function login(
        EmployeeLoginRequest $request
    ) {

        $employee = Employee::where(
            'email',
            $request->email
        )->first();

        if ($employee && !$employee->is_approved) {

            return back()->withErrors([
                'email' => 'Waiting for admin approval.'
            ]);
        }

        $credentials = $request->only(
            'email',
            'password'
        );

        if (
            $this->authService->login($credentials)
        ) {
            return redirect()
                ->route('employee.dashboard');

        }
        return back()->withErrors([

            'email' => 'Invalid credentials'

        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()
            ->route('employee.login');
    }
}

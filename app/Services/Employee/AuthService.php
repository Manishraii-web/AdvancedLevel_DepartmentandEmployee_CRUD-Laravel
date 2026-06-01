<?php

namespace App\Services\Employee;

use App\Models\Employee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeOtpMail;

class AuthService
{
    protected Employee $employee;

    public function __construct(
        Employee $employee
    ) {
        $this->employee = $employee;
    }

    /**
     * Register Employee
     */
    public function register(array $data): Employee
    {
        if (isset($data['image'])) {

            $data['image'] = $data['image']
                ->store('employees', 'public');

        }

        return $this->employee->create([

            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'department_id' => $data['department_id'],
            'image' => $data['image'] ?? null,
            'password' => Hash::make(
                $data['password']
            ),

            'is_approved' => false,

        ]);
    }

    /**
     * Login Employee
     */
    public function login(array $credentials): string|bool {

       if(!Auth::guard('employee')->attempt($credentials)){
        return false;
       }
        $employee = auth()->guard('employee')->user();
          $otp = rand(100000, 999999);
           $employee->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute(4),
            'last_login_at' => now()
        ]);

        session(['mfa_employee_id' => $employee->id]);
        Auth::guard('employee')->logout();
       Mail::to($employee->email)->send(new EmployeeOtpMail($otp));
       return 'mfa_required';

    }

    /**
     * Logout
     */
    public function logout(): void
    {
        Auth::guard('employee')
            ->logout();
    }
}

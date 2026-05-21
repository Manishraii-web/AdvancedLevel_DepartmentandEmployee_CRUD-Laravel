<?php

namespace App\Services\Employee;

use App\Models\Employee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function login(
        array $credentials
    ): bool {

        return Auth::guard('employee')
            ->attempt($credentials);

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

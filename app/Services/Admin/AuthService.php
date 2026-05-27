<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(protected Admin $admin)
    {}

    public function login(array $credentials): bool
    {

        if( Auth::guard('admin')
            ->attempt($credentials)) {
        $admin = Auth::guard('admin')->user();
        $admin->update([

            'last_login_at'=> now()
        ]);

        return true;
        }

        return false;

    }

    public function register(
        array $data
    ) {


        return $this->admin->create([

            'name' => $data['name'],

            'email'=> $data['email'],

            'password' => Hash::make(
                $data['password']
            ),
        ]);

    }


    public function logout(): void
    {
        Auth::guard('admin')->logout();
    }
}

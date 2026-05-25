<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(protected Admin $admin)
    {}

    public function login(
        array $credentials
    ): bool {

        return Auth::guard('admin')
            ->attempt($credentials);


    }

    public function register(
        array $data
    ) {
        if(Auth::guard('admin')->check()){

        return $this->admin->create([

            'name' => $data['name'],

            'email'=> $data['email'],

            'password' => Hash::make(
                $data['password']
            ),
        ]);
    } else {
        return redirect()->route('admin.login');
    }
    }


    public function logout(): void
    {
        Auth::guard('admin')->logout();
    }
}

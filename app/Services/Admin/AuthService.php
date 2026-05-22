<?php

namespace App\Services\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthService
{
   protected Admin $admin;
   public function __construct(Admin $admin)
   {
       $this->admin = $admin;
   }

  public function login(array $credentials): bool
{
    if (Auth::guard('employee')->attempt($credentials)) {

        $employee = Auth::guard('employee')->user();

        if (!$employee->is_approved) {

            Auth::guard('employee')->logout();

            return false;
        }

        return true;
    }

    return false;
}

   public function register(array $data) : Admin {
    return $this->admin->create([
        'name' => $data['name'],
        'email'=> $data['email'],
        'password' => Hash::make($data['password']),
    ]);
   }

   public function logout(): void {
    Auth::guard('admin')->logout();
   }
}

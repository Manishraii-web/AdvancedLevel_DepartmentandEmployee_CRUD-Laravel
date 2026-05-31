<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminOtpMail;

class AuthService
{
    public function __construct(protected Admin $admin) {}

    public function login(array $credentials): string|bool
    {

        if (!Auth::guard('admin')->attempt($credentials)) {
            return false;
        }
            $admin = auth()->guard('admin')->user();
            session(['mfa_admin_id' => $admin->id]);  //for storing temperorary session idd
            Auth::guard('admin')->logout();  //logout immediatley impo for mfa auth
            $otp = rand(100000, 999999);

             $admin->update([
                'otp_code' => $otp,
                'otp_expires_at' => now()->addMinute(4),
                'last_login_at'=>now()
             ]);
             //sending otp
             Mail::to($admin->email)->send(new AdminOtpMail($otp)
             );
             return 'mfa_required';

    }

    public function register(
        array $data
    ) {


        return $this->admin->create([

            'name' => $data['name'],

            'email' => $data['email'],

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

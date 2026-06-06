<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
        'is_mfa_enabled',
        'mfa_secret_key',
        'otp_code',
        'otp_expires_at'
    ];

    protected $hidden = [
        'password',
        'mfa_secret_key',
        'otp_code'

    ];
    protected $casts = [

    'last_login_at' => 'datetime',
    'is_mfa_enabled' => 'boolean',
    'otp_expires_at' => 'datetime',
    'password' => 'hashed',

];
}

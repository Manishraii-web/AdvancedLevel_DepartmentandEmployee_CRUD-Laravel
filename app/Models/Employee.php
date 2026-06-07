<?php

namespace App\Models;

// use Illuminate\Auth\Middleware\Authenticate;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
//use Laravel\Sanctums\HasApiTokens;

class Employee extends Authenticatable
{
    use SoftDeletes, HasApiTokens;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'department_id',
        'salary',
        'image',
        'is_approved',
        'is_mfa_enabled',
        'mfa_secret_key',
        'otp_code',
        'otp_expires_at',
        'last_login_at'

    ];
    protected $hidden = ['password', 'mfa_secret_key', 'otp_code'];

    protected $casts = [
        'password' => 'hashed',
        'is_mfa_enabled' => 'boolean',
        'otp_expires_at' => 'datetime',
        'last_login_at' => 'datetime',

    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

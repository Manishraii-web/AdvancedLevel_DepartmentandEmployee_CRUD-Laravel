<?php

namespace App\Models;

// use Illuminate\Auth\Middleware\Authenticate;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
   use SoftDeletes;

   protected $fillable =[
    'firstname',
    'lastname',
    'email',
    'phone',
    'department_id',
    'salary',
    'image',
    'password',
    'is_approved',
     'is_mfa_enabled',
        'mfa_secret_key',
        'otp_code',
        'otp_expires_at'

   ];
    protected $hidden = ['password','mfa_secret_key','otp_code'];

    protected $casts = [
        'password' => 'hashed',
        'is_mfa_enabled' =>'boolean',
        'otp_expires_at'=>'datetime',

    ];

   public function department(){
    return $this->belongsTo(Department::class);
   }
}

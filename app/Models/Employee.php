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

   ];
    protected $hidden = ['password',];

    protected $casts = [
        'password' => 'hashed',
    ];

   public function department(){
    return $this->belongsTo(Department::class);
   }
}

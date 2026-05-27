<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
    ];
    protected $casts = [

    'last_login_at' => 'datetime',

];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
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
   ];

   public function department(){
    return $this->belongsTo(Department::class);
   }
}

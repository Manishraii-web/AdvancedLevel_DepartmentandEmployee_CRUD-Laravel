<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});

    require __DIR__.'/admin.php';

    require __DIR__.'/department.php';

    require __DIR__.'/employee-auth.php';

    require __DIR__.'/employee.php';




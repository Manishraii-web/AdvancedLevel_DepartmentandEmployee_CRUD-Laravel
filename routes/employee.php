<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;

Route::middleware('auth.admin')->group(function() {
    Route::resource('employees', EmployeeController::class);
});

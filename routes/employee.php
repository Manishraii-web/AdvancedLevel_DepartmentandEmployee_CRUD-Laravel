<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;

Route::middleware('auth:admin')->group(function() {

      Route::get(
    '/employees/pending',
    [EmployeeController::class, 'pending']
)->name('employees.pending');

Route::put(
    '/employees/{employee}/approve',
    [EmployeeController::class, 'approve']
)->name('employees.approve');


    Route::resource('employees', EmployeeController::class);





});

<?php

use App\Http\Controllers\Employee\AuthController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/employee/login',
    [AuthController::class,'showLogin']
)->name('employee.login');

Route::post(
    '/employee/login',
    [AuthController::class,'login']
)->name('employee.login.submit');

Route::get(
    '/employee/register',
    [AuthController::class,'showRegister']
)->name('employee.register');

Route::post(
    '/employee/register',
    [AuthController::class,'register']
)->name('employee.register.submit');

Route::post(
    '/employee/logout',
    [AuthController::class,'logout']
)->name('employee.logout');

Route::get(
    'employee/dashboard',
    function () {
        return 'Employee Dashboard';
    }
)->name('employee.dashboard');

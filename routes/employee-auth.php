<?php

use App\Http\Controllers\Employee\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;


Route::middleware('guest:employee')->group(function() {
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

 });

Route::middleware('employee.auth')->group(function() {
Route::post(
    '/employee/logout',
    [AuthController::class,'logout']
)->name('employee.logout');


Route::get(
    '/employee/dashboard', [EmployeeController::class,'employeeDashboard'])->name('employee.dashboard');


});

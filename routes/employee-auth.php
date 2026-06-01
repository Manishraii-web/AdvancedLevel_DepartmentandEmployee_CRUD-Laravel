<?php

use App\Http\Controllers\Employee\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\EmployeeMfaController;

Route::get('/employee/mfa', [EmployeeMfaController::class, 'show']) ->name('employee.mfa.form');
Route::post('/employee/mfa', [EmployeeMfaController::class, 'verify']) ->name('employee.mfa.verify');

Route::prefix('employee')->group(function() {
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

Route::middleware('employee')->group(function() {
Route::post(
    '/employee/logout',
    [AuthController::class,'logout']
)->name('employee.logout');


Route::get(
    '/employee/dashboard', [EmployeeController::class,'employeeDashboard'])->name('employee.dashboard');


});
});

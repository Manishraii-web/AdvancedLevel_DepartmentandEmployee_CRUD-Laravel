<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminMfaController;


Route::get('/admin/mfa', [AdminMfaController::class, 'show'])
    ->name('admin.mfa.form');

Route::post('/admin/mfa', [AdminMfaController::class, 'verify'])
    ->name('admin.mfa.verify');




Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::middleware('admin')->group(function () {


    Route::get('/register', [AuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register.submit');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboardi');
});

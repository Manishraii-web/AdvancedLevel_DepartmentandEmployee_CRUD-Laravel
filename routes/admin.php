<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest:admin')->group(function(){

 Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');

Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.submit');

});

Route::middleware('auth:admin')->group(function(){

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('admin.dashboardi');
});


<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department\DepartmentController;

Route::middleware('auth:admin')->group(function(){
    Route::resource('departments',DepartmentController::class);
});

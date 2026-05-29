<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department\DepartmentController;

// Route::middleware('auth:admin')->group(function(){
//     Route::resource('departments',DepartmentController::class);
// });

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departmenty.index');

    // Create Form
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');

    // Store Department
    Route::post('/departments',[DepartmentController::class, 'store'])->name('departments.store');

    // Edit Form
    Route::get('/departments/{department}/edit',[DepartmentController::class, 'edit'])->name('departments.edit');

    // Update Department
    Route::put('/departments/{department}',[DepartmentController::class, 'update'])->name('departments.update');

    // Delete Department
    Route::delete('/departments/{department}',[DepartmentController::class, 'destroy'])->name('departments.destroy');
});

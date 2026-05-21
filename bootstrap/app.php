<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
    web: __DIR__.'/../routes/web.php',
    then: function () {

        Route::middleware('web')
            ->group(base_path('routes/admin.php'));

        Route::middleware('web')
            ->group(base_path('routes/employee.php'));

        Route::middleware('web')
            ->group(base_path('routes/department.php'));

        Route::middleware('web')->group(base_path('routes/employee-auth.php'));
    },
)
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

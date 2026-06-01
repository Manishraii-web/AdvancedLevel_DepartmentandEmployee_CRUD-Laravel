<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
    web: __DIR__.'/../routes/web.php',
    then: function () {
    },
)
    ->withMiddleware(function (Middleware $middleware) {


        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminAuthenticate::class,

            'employee' => \App\Http\Middleware\EmployeeAuthenticate::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

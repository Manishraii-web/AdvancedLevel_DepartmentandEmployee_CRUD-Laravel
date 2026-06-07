<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    then: function () {
    },
)
  ->withMiddleware(function (Middleware $middleware) {

//   $middleware->api(prepend: [
//     EnsureFrontendRequestsAreStateful::class,
//   ]);

    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminAuthenticate::class,
        'employee' => \App\Http\Middleware\EmployeeAuthenticate::class,
         'api.logger' => \App\Http\Middleware\ApiLogger::class,
    ]);
})

    ->withExceptions(function (Exceptions $exceptions): void {

    })->create();

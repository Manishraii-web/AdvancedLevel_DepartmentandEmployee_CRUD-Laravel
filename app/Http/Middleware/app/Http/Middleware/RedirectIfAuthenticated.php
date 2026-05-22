<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(
        Request $request,
        Closure $next,
        ...$guards
    ): Response {

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                if ($guard === 'admin') {

                    return redirect()
                        ->route('admin.dashboardi');
                }

                if ($guard === 'employee') {

                    return redirect()
                        ->route('employee.dashboard');
                }
            }
        }

        return $next($request);
    }
}

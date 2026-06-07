<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);


        Log::info('API REQUEST', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_id' => optional($request->user())->id,
            'input' => $request->except(['password','token']),
        ]);

        $response = $next($request);

        $duration = microtime(true) - $start;

        Log::info('API RESPONSE', [
            'status' => $response->status(),
            'content' => $this->safeJson($response),
            'time_ms' => round($duration * 1000, 2),
        ]);

        return $response;
    }

    private function safeJson($response)
    {
        // avoid breaking logs if response is not JSON
        try {
            return json_decode($response->getContent(), true);
        } catch (\Exception $e) {
            return $response->getContent();
        }
    }
}

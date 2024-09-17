<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class LogRequestResponseTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Config::get('app.log_requests')) {
            return $next($request);
        }

        $start = microtime(true);

        $response = $next($request);

        $duration = microtime(true) - $start;

        $logData = [
            'method' => $request->getMethod(),
            'url' => $request->fullUrl(),
            'response_time' => $duration,
            'created_at' => now(),
        ];

        DB::table('request_logs')->insert($logData);

        return $response;
    }
}

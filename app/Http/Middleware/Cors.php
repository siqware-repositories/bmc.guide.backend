<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{

    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH')
            ->header('Access-Control-Allow-Headers', 'Accept, Authorization, Content-Type');
    }
}

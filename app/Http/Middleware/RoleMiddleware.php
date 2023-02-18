<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user()->hasRole($roles)) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}

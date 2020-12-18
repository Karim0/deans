<?php

namespace App\Http\Middleware;

use Closure;

class AdviserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isAdvisor() and !auth()->user()->isAdmin()) {
            abort('403', 'У вас нет прав доступа');
        }
        return $next($request);
    }
}

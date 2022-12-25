<?php

namespace DD4You\Dpanel\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class DdAuth extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->segment(1) === config('dpanel.prefix')) {
                return route(config('dpanel.prefix') . '.login');
            }
            return route('login');
        }
    }
}

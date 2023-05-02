<?php

namespace DD4You\Dpanel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class AccessDpanel
{
    public function handle($request, Closure $next)
    {
        if (!Gate::allows('role')) {
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();
            abort(403, 'You don\'t have permission to access this.');
        }

        return $next($request);
    }
}

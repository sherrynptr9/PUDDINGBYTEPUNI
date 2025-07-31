<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectAdminToPanel
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check() && auth('web')->user()->role === 'admin') {
            return redirect('/admin');
        }
        return $next($request);
    }
}
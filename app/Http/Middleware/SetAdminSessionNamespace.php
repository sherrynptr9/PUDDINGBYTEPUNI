<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetAdminSessionNamespace
{
    public function handle(Request $request, Closure $next)
    {
        config(['session.cookie' => 'admin_session']);
        Session::put('guard', 'admin');
        return $next($request);
    }
}
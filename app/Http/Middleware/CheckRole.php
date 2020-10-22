<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role != $request->path()) {
            abort(403);
        }

        return $next($request);
    }
}

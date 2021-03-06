<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\Facades\Auth;
use Rolepivots;

class EditorMiddleware
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
        if (Auth::check() && Auth::user()->rolePivots->pluck('role_id')->contains('3')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Auth;
use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;


class AdminMiddleware
{
    /**

     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**

     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $uid =  Auth::id();

        $userRole = \DB::table('role_pivots')->select('role_id')->where('user_id', $uid)->first();
        if ($userRole->role_id != 1) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

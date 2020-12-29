<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Auth;
use Closure;
use App\Users;
use App\User;

class AccessUser
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
        $uid =  Auth::id();

        if ($uid) {
            $userRole = \DB::table('role_pivots')->select('role_id')->where('user_id', $uid)->first();
            switch ($userRole->role_id) {
                case '2':
                    return redirect('/categories/list');
                    break;
                case '1':
                    return redirect('/admin/dashboard');
                    break;

                case '3':
                    return redirect('/editorpanel');
                    break;

                default:
                    return redirect('/');
                    break;
            }
        }
        // if ($userRole->role_id != 1) {
        //     return redirect('/categories/list');
        // }

        return $next($request);
    }
}

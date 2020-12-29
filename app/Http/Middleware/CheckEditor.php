<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckEditor
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
        $userRole = Auth::user()->rolePivots->pluck('role_id');

        if ($userRole->contains('3')) {
            return redirect('/editorpanel');
        } elseif ($userRole->contains('1')) {
            return redirect('/adminpanel');
        }
        return redirect('/home');
    }
}


//$userRoles = Auth::user()->roles->pluck('name');

        //if (!$userRoles -> contains('editor')){
            //return redirect('/home');
        //}

<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserAccessRestrictMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::user()->id === $request->user->id || Auth::user()->can($permission)) {
            return $next($request);
        } else {
            flash("You are unauthorized to access that page!", 'warning')->important();
            return back();
        }
    }
}

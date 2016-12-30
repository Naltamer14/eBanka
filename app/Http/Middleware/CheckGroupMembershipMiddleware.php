<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckGroupMembershipMiddleware
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
        if ($request->group->users()->where('id', Auth::id())->count() || Auth::user()->can($permission))
        {
            return $next($request);
        }
        else
        {
            return abort(403);
        }
    }
}

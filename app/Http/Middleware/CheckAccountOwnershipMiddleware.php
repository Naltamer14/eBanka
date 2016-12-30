<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccountOwnershipMiddleware
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
        if ($request->account->user_id == $request->user->id)
        {
            return $next($request);
        }
        else
        {
            return abort(400);
        }
    }
}

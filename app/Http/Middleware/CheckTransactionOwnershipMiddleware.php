<?php

namespace App\Http\Middleware;

use Closure;

class CheckTransactionOwnershipMiddleware
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
        if ($request->transaction->user_id == $request->user->id)
        {
            return $next($request);
        }
        else
        {
            return abort(403);
        }
    }
}

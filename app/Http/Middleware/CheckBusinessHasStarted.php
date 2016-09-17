<?php

namespace App\Http\Middleware;

use Closure;

class CheckBusinessHasStarted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->user()->airline) {
            return redirect()->route('user.airline.create');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class Authorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Gate)
            return $next($request);
    }
}

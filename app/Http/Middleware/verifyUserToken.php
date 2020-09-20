<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserToken
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

            if (2 > 1) {
           return redirect('/showToken');
            }


        return $next($request);
    }
}

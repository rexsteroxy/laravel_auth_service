<?php

namespace App\Http\Middleware;

use Closure;
use Session;

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


        if(!auth()->user()->id == null) {

            session(['verify_token' => $request->post('token')]);


            $token = $request->session()->get('verify_token');

         
            if (auth()->user()->unique_token == $token  || session()->get('token_verify')) {

                session(['token_verify' => true]);
               
                return $next($request);
            }

        }

           return redirect('/showToken');

       
    }
}

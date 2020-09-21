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

        // Check if the user is authenticated
        if(auth()->user()->id) {

        // Store the request in a session key
        session(['verify_token' => $request->post('token')]);

        // Storing the session value in a variable
        $token = $request->session()->get('verify_token');

        // Check if token from request matches token from DB or  If token is already verified
        if (auth()->user()->unique_token == $token  || session()->get('token_verify')) 
        {

            // Store token session on successful verificaition
            session(['token_verify' => true]);
            
            return $next($request);
        }

        }

           return redirect('/showToken');

       
    }
}

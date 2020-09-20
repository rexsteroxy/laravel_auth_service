<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Http\Requests\UserLoginStoreRequest;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //check guest views
        $this->middleware('guest',['except' => ['logout','userLogout',]]);
    }

    
     /**
     * Show the application login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("auth.login");

    }



     /**
     * Login feature.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserLoginStoreRequest $request)
    {

         //validate the form
        $validated = $request->validated();

         // Attempt to authenticate the user
        if (! auth()->attempt(request(['email','password']))) 
        {
                // If not redirect back
                return back()->with('response','Incorrect Credentials');
        }

            // Revoke user token
            $generator = "1357902468abcdefghijklmnopqrstuvwxyz"; 
                
            $token = ""; 

            for ($i = 1; $i <= 8; $i++) 
            { 
                $token .= substr($generator, (rand()%(strlen($generator))), 1); 
            } 


            // Update user token
            $user = new User;
            $user->unique_token = $token;
 
            $data = array(
            'unique_token' => $user->unique_token 
            );
            User::where('id',auth()->user()->id)->update($data);
            $user->update();

            return redirect('/showToken');
       
    }


   


    public function userLogout()
    {
        //ensure user logout
        Auth::guard('web')->logout();

        //destroy token seesion
        session()->forget('token_verify');
        return redirect('/');
    }
}

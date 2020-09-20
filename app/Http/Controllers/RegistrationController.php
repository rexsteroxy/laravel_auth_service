<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRegisterStoreRequest;

class RegistrationController extends Controller

{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');

    }


    
     /**
     * Show the application user register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("auth.register");

    }

    
     /**
     * Store user details to the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterStoreRequest $request)
    {

        //validate the form
        $validated = $request->validated();

        //Generate user token
        $generator = "1357902468abcdefghijklmnopqrstuvwxyz"; 
      
        $result = ""; 
      
        for ($i = 1; $i <= 8; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        } 


        //Create and save the user with uniqe token
        $user =  User::create([
                'name' =>$request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'unique_token' => $result
            ]);

        // Sign the user in 
        auth()->login($user);


        //Redirect to the home page
        return redirect()->home();

    }
}

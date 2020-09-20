<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller

{


    public function __construct(){

        $this->middleware('guest');
    }


    //

    public function create(){

        return view("auth.register");
    }

    //

    public function store(Request $request){

        //Validate the form

        $this->validate(request(), [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);


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

<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

public function __construct(){

    $this->middleware('guest',['except' => ['logout','userLogout']]);
}

    //

    public function create(){

        return view("auth.login");
    }



    public function store(Request $request){

 //validate the form
 $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required|min:6'

]);


        // Attempt to authenticate the user
 if (! auth()->attempt(request(['email','password']))) {

          // If not redirect back
        return back()->withErrors([
            'message'=> "Please Check Your Credentials And Try Again"
        ]);
 }


 return redirect()->home();
        //// Redirect to the homepage
    }


    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

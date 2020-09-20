<?php

namespace App\Http\Controllers;
use Auth;
use App\User;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

public function __construct(){

    $this->middleware('guest',['except' => ['logout','userLogout',]]);
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
            'message'=> 'Please Check Your Credentials And Try Again'
        ]);
 }

 // Revoke user token

$generator = "1357902468abcdefghijklmnopqrstuvwxyz"; 
      
$token = ""; 

for ($i = 1; $i <= 8; $i++) { 
    $token .= substr($generator, (rand()%(strlen($generator))), 1); 
} 

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
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

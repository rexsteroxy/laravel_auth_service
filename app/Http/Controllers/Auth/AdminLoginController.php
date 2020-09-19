<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

//

public function __construct()
    //setting up the middleware for admin
    {
        $this->middleware('guest:admin',['except' => ['logout']]);
    }   

    //to display the admin login form
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    //to login the admin
    public function login(Request $request)
    {
        //validate the form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        //Attempt to log in the user
    if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password], 
    $request->remember))
    {
        //if successful redirect the  user to where he or she is going
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return redirect()->back()->withInput($request->only('email', 'remember'));
        //if unsuccessful redirect back with the form data


    }
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect('/');
}


}

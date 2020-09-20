<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginStoreRequest;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        //setting up the middleware for admin
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }




    //to display the admin login form
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }




    //to login the admin
    public function login(AdminLoginStoreRequest $request)
    {
        //validate the form
        $validated = $request->validated();

        //Attempt to log in admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)) 
        {
            //if successful redirect the  admin to intended
            return redirect()->intended(route('admin.dashboard'));
        }

        //if unsuccessful redirect back with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('response','Incorrect Credentials');
       
    }


    //Admin logout functionality
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin.logout');
    }



}

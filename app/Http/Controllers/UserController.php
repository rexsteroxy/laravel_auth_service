<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updateUser(Request $request)
    {   
        $user_id = auth()->user()->id;
        $email_rule = auth()->user()->email == 
        request('email') ? '' : 'unique:users';

       


        $validatedDate = $request->validate([
            'name' => 'required|min:5',
            'email'=>  $email_rule,
            'phone' => 'required',
            'dp'  => 'mimes:jpeg,png'
        ]);

        $user = User::find($user_id);
        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');

        if($request->file('dp') != null) {
            $request->file('dp')->store('public/profile');
            $fileName = $request->file('dp')->hashName();
            $user->dp = $fileName;
           
        }
        
        $user->save();

        return redirect()->route('home')->with('response','profile sucessfully updated');
        
    }
}

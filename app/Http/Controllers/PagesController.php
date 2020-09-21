<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class PagesController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //check auth except index
        $this->middleware('auth',['except' => ['getHome']]);

    }

     /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {  

        return view('index');
        
    }

     /**
     * Show the application token page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTokenPage()
    {  

        //check if token has been verified
        if (session()->get('token_verify')) {

            return redirect('/home');
           
        }
            return view('token');
    	
    }


   

   

  
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }


    
    public function getHome(){  

    	return view('index');
    }

    public function showTokenPage(){  


        if (session()->get('token_verify')) {

            return redirect('/home');
           
        }
            
            return view('token');
        

    	
    }


   

   

  
    
}

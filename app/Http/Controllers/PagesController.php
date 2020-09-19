<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;

class PagesController extends Controller
{
    
    public function getHome(){ 

    	return view('index');
    }

    public function getAdminDashBoard()
    {
        return view('admin.index');
    }
    
}

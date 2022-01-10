<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index(){
        return view('admin.user.loginPage.logingPage');
    }

    
    public function admin(){
        return view('admin.admin_index');
    }



   

    // update profile route                 

    

}

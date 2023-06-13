<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with('success', 'LogOut Successful');
    }
}

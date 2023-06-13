<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(){
        return view('LLR.login');
    }
    function login_validate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('email' , 'password');
        if(Auth::attempt($data)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->with('fail', 'Your Login is not valid');
    }
}

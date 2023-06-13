<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function register(){
        return view('LLR.register');
    }
    function register_post(Request $request){
        $user = new User();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password =Hash::make(request()->password);
        $user->save();
        return redirect(route('login'))->with('success', 'Register Successful!');
    }
}

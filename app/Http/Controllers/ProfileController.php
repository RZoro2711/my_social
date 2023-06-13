<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    function profile(){
        return view('profile');
    }
    function edit(){
        return view('edit.profileEdit');
    }
    function update(Request $request){
        $id = request()->id;
        $user = User::find($id);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->phone = request()->phone;
        $user->address = request()->address;
        $user->date = request()->dob;
        $user->gender = request()->gender;
        if ($request->hasFile('profile_photo')) {
            $destination = 'uploads/users/' . $user->profile_photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/users/', $filename);
            $user->profile_photo = $filename;
        }
        $user->save();
        return redirect(route('profile'));
    }
}

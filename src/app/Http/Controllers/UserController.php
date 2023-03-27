<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\ProfileRequest;


class UserController extends Controller
{
    public function profile(){
        return view('profile');
    }

    public function updateProfile(ProfileRequest $request){
        
        User::find(Auth::id())->update([
            'name' => $request->name
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building
        ]);
        
        return redirect('/');
    }
}

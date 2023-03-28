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

        $profile = Profile::where('user_id', Auth::id())->first();

        return view('profile',compact('profile'));
    }

    public function updateProfile(ProfileRequest $request){

        $img = $request->img_url;
        $img_url = $img->store('img','public');

        $profile = Profile::where('user_id', Auth::id())->first();
        if ($profile){
            $profile->update([
                'user_id' => Auth::id(),
                'img_url' => $img_url,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }else{
            Profile::create([
                'user_id' => Auth::id(),
                'img_url' => $img_url,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building
            ]);    
        }

        User::find(Auth::id())->update([
            'name' => $request->name
        ]);
        
        return redirect('/');
    }

    public function mypage(){
        $user = User::find(Auth::id());
        return view('mypage', compact('user'));
    }
}

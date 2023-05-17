<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected function _registerOrLoginUser($data){
    $user = User::where('email',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }
        
    //Google callback
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        $this->_registerorLoginUser($user);
        return redirect()->route('dashboard');
    }
}

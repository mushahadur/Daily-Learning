<?php

namespace App\Repositories;

use App\Models\ExploreCountry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface{
    public function authInfo(){
        return Auth::user();
    }

    public function findByUser($user){
        return User::findOrFail($user);
    }
    
    public function updateUser($request, $user)
    {
        $get_user = $this->findByUser($user);
        // dd($get_user);
        if ($request->hasFile('avatar')) {
            $destinationPath= 'public/profile-image/';
            $image      = $request->file('avatar');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath,$fileName);
            $get_user->avatar = $fileName;
        }
        
        $get_user->name = $request->name;
        $get_user->phone = $request->phone;
        $get_user->address = $request->address;
        $get_user->city = $request->city;
        $get_user->country = $request->country;
        $get_user->state = $request->state;
        $get_user->update();
    }
}










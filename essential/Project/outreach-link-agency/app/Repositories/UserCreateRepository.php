<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserCreateRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserCreateRepository implements UserCreateRepositoryInterface
{

    public function userAll()
    {
        return User::orderBy('created_at', 'DESC')->get();
    }

    public function roleAll()
    {
        return Role::where('name', '!=', 'Super Admin')->get();
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function imageResize($request, $user)
    {

        if ($request->hasFile('image')) {
            $destinationPath = 'public/profile-image/';
            $image      = $request->file('image');
            $fileName   = time() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $fileName);
            $user->avatar = $fileName;
        }
    }

    public function storeData($request)
    {
        $date = Carbon::today();
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->get('password')),
            'email_verified_at' => $date,
        ]);

        $this->imageResize($request, $user);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $user->save();
        Alert::success('Congratulation', 'User Create Successfully');
    }



    public function updateData($request, $id)
    {

        $user = $this->findById($id);
        $this->imageResize($request, $user);

        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update();
        Alert::success('Congratulation', 'User Update Successfully');

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
    }
}

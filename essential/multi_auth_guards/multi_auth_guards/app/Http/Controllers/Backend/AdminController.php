<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::get();
        // dd($admins->name);
        $roles = Role::get();
        return view('backend.pages.admin.index', compact('admins','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('backend.pages.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:admins|max:255|min:3',
            'username' => 'required|unique:admins|max:255|min:3',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password) ;
        $check = $admin->save();
        // dd($request->roles);

        if(!empty($request->roles)){
            $admin->assignRole($request->roles);
            // dd($admin);
        }
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::get();
        return view('backend.pages.admin.edit', compact('roles','admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name'     => 'required|max:255|min:3',
            'email'    => 'required|email|unique:admins|max:255|min:3',
            'username' => 'required|unique:admins|max:255|min:3',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        if($request->password){
            $admin->password = Hash::make($request->password);
        }
        $admin->update();
        // Alert::success('Congratulation', 'Admin Update Successfully');

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        if(!is_null($admin)){
            $admin->delete();
            return back();
        }
        return back();
    }
}

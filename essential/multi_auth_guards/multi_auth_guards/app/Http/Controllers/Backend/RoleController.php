<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public $user;

    public function __construct(){
        $this->middleware(function($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
        
    }
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
       
        // if(is_null($this->user) || !$this->user->can('role.view')){
        //     abort(403, 'Sorry !! Unauthorized Access to role view');
        // }
        $roles = Role::get();
        $permissions = Permission::get();
        return view('backend.pages.role.index', compact('roles','permissions'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(is_null($this->user) || !$this->user->can('role.create')){
        //     abort(403, 'Sorry !! Unauthorized Access to role create');
        // }
        $permissions = Permission::get();
        $permission_groups = User::getPermissionGroup();
        session()->flash('success', 'Role successfully Created !');
        return view('backend.pages.role.create', compact('permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if(is_null($this->user) || !$this->user->can('role.store')){
        //     abort(403, 'Sorry !! Unauthorized Access to role store');
        // }
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255|min:3',
        ]);
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        $permission = $request->input('permissions');

        if(!empty($permission)){
            $role->syncPermissions($permission);
        }

        return redirect()->route('role.index');
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
    public function edit(string $id,)
    {
        // if(is_null($this->user) || !$this->user->can('role.edit')){
        //     abort(403, 'Sorry !! Unauthorized Access to role edit');
        // }
        $role = Role::findById($id, 'admin');
        $permissions = Permission::get();
        $permission_groups = User::getPermissionGroup();
        // dd($role);
        return view('backend.pages.role.edit', compact('role','permissions','permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // if(is_null($this->user) || !$this->user->can('role.update')){
        //     abort(403, 'Sorry !! Unauthorized Access to role update');
        // }
        $validated = $request->validate([ 
            'name' => 'required|max:255|min:3',
        ]);
        $role = Role::findById($id, 'admin');
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }
        session()->flash('success', 'Role successfully Updated !');
        return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(is_null($this->user) || !$this->user->can('role.delete')){
            abort(403, 'Sorry !! Unauthorized Access to role delete');
        }
        $role = Role::findById($id, 'admin');
        if(!is_null($role)){
            $role->delete();
            return back();
        }
        return back();
    }
}

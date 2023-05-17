<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RolePermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionRepository implements RolePermissionRepositoryInterface{

    public function rollAll(){
        return Role::all();
    }

    public function permissionAll(){
        return Permission::all();
    }

    public function findId($id){
        return Role::findById($id);
    }

    public function storeData($request){

        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
    }

    public function updateData($request, $id){

        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }
    }
}

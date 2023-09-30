<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Role
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $roleaAdmin = Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'User']);
        $roleEditor = Role::create(['name' => 'Editor']);

        //Permission list as array
        $permissions = [
            //Dashboard Group psermission
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard-view',
                    'dashboard-edit',
                ]
            ],
            //Blog Group psermission
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog-create',
                    'blog-view',
                    'blog-edit',
                    'blog-delete',
                    'blog-approve',
                ]
            ],

            //Admin Group psermission
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin-create',
                    'admin-view',
                    'admin-edit',
                    'admin-delete',
                    'admin-approve',
                ]
            ],
            //Role Group psermission
            [
                'group_name' => 'role',
                'permissions' => [
                    'role-create',
                    'role-view',
                    'role-edit',
                    'role-delete',
                    'role-approve',
                ]
            ],
             //Profile Group psermission
             [
                'group_name' => 'profile',
                'permissions' => [
                    'profile-view',
                    'profile-edit',
                ]
            ],
        ];

        //Create adn Assign Permissions
        for ($i=0; $i <count($permissions) ; $i++) { 
            $permissionGroup = $permissions[$i]['group_name'];
            # Create Permission
            for ($j=0; $j < count($permissions[$i]['permissions']) ; $j++) { 
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}

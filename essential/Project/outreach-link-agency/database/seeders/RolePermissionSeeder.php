<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperAdmin = Role::where('name', 'Super Admin')->first();
        $roleUser = Role::where('name', 'Customer')->first();
        
        if (is_null($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        }
        if(is_null($roleUser)){
            $roleUser = Role::create(['name' => 'Customer']);
        }

        $permissions = [

            [
                'group_name' => 'Admin Dashboard',
                'permissions' => ['Dashboard Sidebar Button']
            ],
            [
                'group_name' => 'Settings',
                'permissions' => [
                    'Settings Sidebar Button',
                    'Settings Update Button',
                ]
            ],
            [
                'group_name' => 'Profile',
                'permissions' => [
                    'Profile Header Button',
                    'Profile Update Button',
                    'Password Update Button',
                ]
            ],
            [
                'group_name' => 'Role',
                'permissions' => [
                    'Role Sidebar Button',
                    'Role Create',
                    'Role Edit',
                    'Role Delete',
                ]
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    'User Sidebar Button',
                    'User Create',
                    'User Edit',
                    'User Delete',
                ]
            ],
            [
                'group_name' => 'Explore Sites',
                'permissions' => [
                    'Explore Sites Sidebar Button',
                ]
            ],
            [
                'group_name' => 'Explore Header',
                'permissions' => [
                    'Explore Header Sidebar Button',
                    'Explore Header Create',
                    'Deactivate Header',
                    'Explore Header Edit',
                    'Explore Header Delete',
                ]
            ],
            [
                'group_name' => 'Explore Sub Header',
                'permissions' => [
                    'Explore Sub Header Sidebar Button',
                    'Explore Sub Header Create',
                    'Deactivate Sub Header',
                    'Explore Sub Header Edit',
                    'Explore Sub Header Delete',
                ]
            ],
            [
                'group_name' => 'Explore Categories',
                'permissions' => [
                    'Explore Categories Sidebar Button',
                    'Explore Categories Create',
                    'Explore Categories Edit',
                    'Explore Categories Delete',
                ]
            ],
            [
                'group_name' => 'Explore Countries',
                'permissions' => [
                    'Explore Countries Sidebar Button'
                ]
            ],
            [
                'group_name' => 'Explore Languages',
                'permissions' => [
                    'Explore Languages Sidebar Button'
                ]
            ],
            [
                'group_name' => 'Explore Publication',
                'permissions' => [
                    'Explore Publication Sidebar Button',
                    'Explore Publication Create',
                    'Explore Publication Edit',
                    'Explore Publication Delete',
                ]
            ],
            [
                'group_name' => 'Explore Hyperlink',
                'permissions' => [
                    'Explore Hyperlink Sidebar Button',
                    'Explore Hyperlink Create',
                    'Explore Hyperlink Edit',
                    'Explore Hyperlink Delete',
                ]
            ],
            [
                'group_name' => 'Exploresites',
                'permissions' => [
                    'Exploresites Sidebar Button',
                    'Exploresites Create',
                    'Exploresites Active',
                    'Exploresites View',
                    'Exploresites Edit',
                    'Exploresites Delete',
                ]
            ],
            [
                'group_name' => 'Explore Services',
                'permissions' => [
                    'Explore Services Sidebar Button',
                ]
            ],
            [
                'group_name' => 'Content Writing & Publishing',
                'permissions' => [
                    'Content Writing Sidebar Button',
                    'Content Writing Edit',
                ]
            ],
            [
                'group_name' => 'Package',
                'permissions' => [
                    'Package Sidebar Button',
                    'Package List Sidebar Button',
                    'Package Create',
                    'Package Deactivate',
                    'Package Edit',
                    'Package View',
                    'Package Delete',
                ]
            ],
            [
                'group_name' => 'Content',
                'permissions' => [
                    'Content Sidebar Button',
                    'Content List Sidebar Button',
                    'Content Create',
                    'Content Edit',
                    'Content Delete',
                ]
            ],
            [
                'group_name' => 'Subscription',
                'permissions' => [
                    'Subscription Sidebar Button',
                    'Subscription Plan List Sidebar Button',
                    'Subscription List Sidebar Button',
                    'Subscription Create',
                    'Subscription Deactivate',
                    'Subscription View',
                    'Subscription Edit',
                    'Subscription Delete',
                ]
            ],
            [
                'group_name' => 'Explore Site Order',
                'permissions' => [
                    'Exploresite Order Sidebar Button',
                    'Exploresite Order Edit',
                    'Exploresite Order View',
                ]
            ],
            [
                'group_name' => 'Content Order',
                'permissions' => [
                    'Content Order Sidebar Button',
                    'Content Order Edit',
                    'Content Order View',
                ]
            ],
            [
                'group_name' => 'Package Order',
                'permissions' => [
                    'Package Order Sidebar Button',
                    'Package Order Edit',
                    'Package Order View',
                ]
            ],
            [
                'group_name' => 'Invoice',
                'permissions' => [
                    'Invoice Sidebar Button',
                ]
            ],
            [
                'group_name' => 'Coupon',
                'permissions' => [
                    'Coupon Sidebar Button',
                    'Coupon Create',
                    'Coupon Edit',
                    'Coupon Delete',
                ]
            ],
            [
                'group_name' => 'Report',
                'permissions' => [
                    'Site Order Report Sidebar Button',
                    'Content Order Report Sidebar Button',
                    'Package Order Report Sidebar Button',
                ]
            ],
            [
                'group_name' => 'Contact',
                'permissions' => [
                    'Message List Sidebar Button',
                ]
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Admin::where('email','superadmin@gmail.com')->first();
        if(is_null($user)){
            $user = new Admin();
            $user->name = "Super Admin";
            $user->username = "superadmin";
            $user->email = "superadmin@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
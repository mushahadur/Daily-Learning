<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','mushahedur@gmail.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Mushahedur";
            $user->email = "mushahedur@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}

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
    public function run()
    {
        $user = User::where('email', 'info@bitchipdigital.com')->first();

        if (is_null($user)) {
            $user = [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Outreach Link Agency',
                'email' => 'info@gmail.com',
                'password' => Hash::make('12345678'),
                'avatar' => 'default.png',
                'email_verified_at' => '2023-03-02 15:36:47'
            ];
            $users = User::create($user);
            $users->assignRole('Super Admin');
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@zinza.com.vn')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@zinza.com.vn',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'status' => 1
            ]);
        }
        //set permission
        $user->assignRole('Admin');

        $user = User::where('email', 'uc@zinza.com.vn')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'User Company',
                'email' => 'uc@zinza.com.vn',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'status' => 1
            ]);
        }
        //set permission
        $user->assignRole('UC');

        $user = User::where('email', 'member@zinza.com.vn')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Member',
                'email' => 'member@zinza.com.vn',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'status' => 1
            ]);
        }
        //set permission
        $user->assignRole('Member');
    }
}

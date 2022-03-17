<?php

namespace Database\Seeders;

use App\Models\User;
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
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => 'User Seeder '.$i,
                'email' => 'user'.$i.'@user.com',
                'password' => Hash::make('user1234'),
            ]);
        }
    }
}

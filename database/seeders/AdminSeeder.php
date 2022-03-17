<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Fuat Akbar',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('admin1234'),
            'is_verified' => true
        ]);
    }
}

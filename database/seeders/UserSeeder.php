<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@admin.com',
            'name'  => 'Administrator',
            'role'  => 'admin',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'email' => 'user@user.com',
            'name'  => 'User',
            'role'  => 'user',
            'password' => bcrypt('user'),
        ]);
    }
}

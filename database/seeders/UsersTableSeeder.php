<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'number' => 147258369,
            'password' => bcrypt('password'),
            'isAdmin' => true,
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'number' => 987654321,
            'password' => bcrypt('password'),
            'isAdmin' => false,
        ]);
    }
}

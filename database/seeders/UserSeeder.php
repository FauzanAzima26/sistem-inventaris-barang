<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ✅ penting: import model User
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun Admin
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        // Membuat akun Operator
        User::updateOrCreate(
            ['username' => 'operator'],
            [
                'password' => Hash::make('operator12345'),
                'role' => 'operator',
            ]
        );
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'email' => 'admin@veloxauto.vn',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'test@example.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $this->call(ProductSeeder::class);
    }
}

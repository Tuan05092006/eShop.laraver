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
        // Seed roles & permissions first
        $this->call(RolesAndPermissionsSeeder::class);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@veloxauto.vn'],
            [
                'password' => 'password123',
                'role' => 'admin',
            ]
        );
        $admin->assignRole('admin');

        // Create test user
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'password' => 'password123',
                'role' => 'user',
            ]
        );
        $user->assignRole('user');

        $this->call(ProductSeeder::class);
    }
}

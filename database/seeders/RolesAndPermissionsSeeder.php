<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed roles and permissions for the application.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ── Permissions ──────────────────────────────────
        $permissions = [
            // Products
            'view products',
            'create products',
            'edit products',
            'delete products',
            // Orders
            'view orders',
            'manage orders',
            'place orders',
            // Brands
            'view brands',
            'create brands',
            'delete brands',
            // Analytics
            'view analytics',
            // Users
            'view users',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ── Roles ──────────────────────────────────
        // Admin: full access (handled via Gate::before in AuthServiceProvider)
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Manager: manage products, orders, brands, analytics
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $managerRole->givePermissionTo([
            'view products', 'create products', 'edit products', 'delete products',
            'view orders', 'manage orders',
            'view brands', 'create brands', 'delete brands',
            'view analytics',
            'view users',
        ]);

        // User: basic customer permissions
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo([
            'view products',
            'place orders',
            'view brands',
        ]);
    }
}

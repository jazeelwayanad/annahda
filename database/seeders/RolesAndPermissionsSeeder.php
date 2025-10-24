<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage permissions',
            'manage roles',
            'manage admins',
            'manage categories',
            'manage tags',
            'manage journal',
            'view articles',
            'create articles',
            'edit articles',
            'delete articles',
            'manage users',
        ];

        // Create permissions only if missing
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles safely
        $superadmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $developer = Role::firstOrCreate(['name' => 'developer', 'guard_name' => 'web']);

        // Give all permissions to both roles
        $superadmin->syncPermissions(Permission::all());
        $developer->syncPermissions(Permission::all());

        $this->command->info('✅ Roles & Permissions seeded successfully.');
    }
}

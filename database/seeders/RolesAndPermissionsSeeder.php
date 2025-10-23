<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage permissions']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage admins']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage tags']);
        Permission::create(['name' => 'manage journal']);
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'manage users']);

        // update cache to know about the newly created permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        $superadmin = Role::create(['name' => 'super-admin']);
        $developer = Role::create(['name' => 'developer']);

        // give permissions to all roles
        $superadmin->givePermissionTo(Permission::all());
        $developer->givePermissionTo(Permission::all());
    }
}

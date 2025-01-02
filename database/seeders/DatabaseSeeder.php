<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $super_admin = User::create([
            'type' => 'admin',
            'name' => 'Humblar Technologies',
            'email' => 'admin@humblar.in',
            'password' => '@Password',
        ]);

        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        $super_admin->assignRole('super-admin');
    }
}

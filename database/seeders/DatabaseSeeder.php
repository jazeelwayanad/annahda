<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🧑‍💼 Create Super Admin
        $super_admin = User::create([
            'type' => 'admin',
            'name' => 'Humblar Technologies',
            'email' => 'admin@humblar.in',
            // Make sure passwords are hashed — Laravel won’t auto-hash this!
            'password' => bcrypt('@Password'),
        ]);

        // 🧩 Seed other base data first
        $this->call([
            RolesAndPermissionsSeeder::class,
            PageSeeder::class,
            PlanSeeder::class,
        ]);

        $super_admin->assignRole('super-admin');

        // 🗂️ Create multiple categories instead of one
        $categories = Category::factory()->count(5)->create();

        // 📰 Create articles safely — assign valid category IDs dynamically
        Article::factory()->count(20)->create([
            'category_id' => $categories->random()->id,
            'user_id' => $super_admin->id,
        ]);
    }
}

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
        // 🧑‍💼 Create Super Admin (only if not exists)
        $super_admin = User::firstOrCreate(
            ['email' => 'admin@humblar.in'],
            [
                'type' => 'admin',
                'name' => 'Humblar Technologies',
                'password' => bcrypt('@Password'),
            ]
        );

        // 🧩 Seed other base data first
        $this->call([
            RolesAndPermissionsSeeder::class,
            PageSeeder::class,
            PlanSeeder::class,
        ]);

        $super_admin->assignRole('super-admin');

        // 🗂️ Create categories
        $categories = Category::factory()->count(5)->create();

        // 📰 Create articles safely
        Article::factory()->count(20)->create([
            'category_id' => $categories->random()->id,
            'user_id' => $super_admin->id,
        ]);
    }
}

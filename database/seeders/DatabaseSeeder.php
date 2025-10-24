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
     * Seed the application's database safely.
     */
    public function run(): void
    {
        // 🧑‍💼 Create or update super admin
        $super_admin = User::updateOrCreate(
            ['email' => 'admin@humblar.in'],
            [
                'type' => 'admin',
                'name' => 'Humblar Technologies',
                'password' => bcrypt('@Password'),
            ]
        );

        // 🧩 Run dependent seeders safely
        $this->call([
            RolesAndPermissionsSeeder::class,
            PageSeeder::class,
            PlanSeeder::class,
        ]);

        // Assign role safely
        if (! $super_admin->hasRole('super-admin')) {
            $super_admin->assignRole('super-admin');
        }

        // 🗂️ Seed categories only if table is empty
        if (Category::count() === 0) {
            $categories = Category::factory()->count(5)->create();
            $this->command->info('✅ Categories seeded successfully.');
        } else {
            $categories = Category::all();
            $this->command->warn('⚠️ Categories already exist — skipping creation.');
        }

        // 📰 Seed articles safely
        if (Article::count() === 0) {
            Article::factory()->count(20)->create([
                'category_id' => $categories->random()->id,
                'user_id' => $super_admin->id,
            ]);
            $this->command->info('✅ Articles seeded successfully.');
        } else {
            $this->command->warn('⚠️ Articles already exist — skipping creation.');
        }
    }
}

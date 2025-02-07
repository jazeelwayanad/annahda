<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            PageSeeder::class,
        ]);

        $super_admin->assignRole('super-admin');

        Category::create([
            'name' => fake('ar')->name(),
            'slug' => Str::slug(fake()->name()),
            'description' => fake()->paragraph(),
            'image' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'status' => true,
        ]);

        Article::factory()->count(20)->create();
    }
}

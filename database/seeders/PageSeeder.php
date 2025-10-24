<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        if (Page::count() > 0) {
            $this->command->warn('⚠️ Pages already exist — skipping.');
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            Page::create([
                'title' => fake()->sentence(),
                'slug' => Str::slug(fake()->unique()->sentence()),
                'content' => fake()->paragraphs(5, true),
                'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
                'meta_title' => fake()->sentence(),
                'meta_description' => fake()->paragraph(),
            ]);
        }

        $this->command->info('✅ Pages seeded successfully.');
    }
}

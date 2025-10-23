<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'meta_title' => fake()->name(),
            'meta_description' => fake()->paragraph(),
        ]);
        Page::create([
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'meta_title' => fake()->name(),
            'meta_description' => fake()->paragraph(),
        ]);
        Page::create([
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'meta_title' => fake()->name(),
            'meta_description' => fake()->paragraph(),
        ]);
        Page::create([
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'meta_title' => fake()->name(),
            'meta_description' => fake()->paragraph(),
        ]);
        Page::create([
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'meta_title' => fake()->name(),
            'meta_description' => fake()->paragraph(),
        ]);
    }
}

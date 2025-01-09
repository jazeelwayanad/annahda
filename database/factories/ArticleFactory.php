<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => 1,
            'title' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'content' => fake()->paragraphs(5, true),
            'thumbnail' => "pages/thumbnails/01JH4X3E439SH01JASAR49XPAN.jpg?ik-sdk-version=php-2.0.0",
            'status' => 'published',
            'reviewed' => true,
            'comments' => true,
            'meta_title' => fake()->name(),
            'meta_description' => fake()->name(),
            'og_title' => fake()->name(),
            'og_description' => fake()->name(),
        ];
    }
}

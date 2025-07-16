<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => fake()->realText(50),
            'content' => fake()->realText(5000),
            'published' => (bool)random_int(0, 10), 
            'notifications' => fake()->randomElements(['push', 'email', 'sms'], random_int(0, 3)),
            'photo_path' => "https://picsum.photos/seed/" . rand(1, 1000000) . "/600/800",
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Greeting;
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
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ]);

        // Greeting::create(['greeting' => 'Hello']);
        // Greeting::create(['greeting' => 'Hi']);
        // Greeting::create(['greeting' => 'Greetings']);
        // Greeting::create(['greeting' => 'Welcome']);
        // Greeting::create(['greeting' => 'Salutations']);

        Article::factory()->count(1000)->create();
    }
}

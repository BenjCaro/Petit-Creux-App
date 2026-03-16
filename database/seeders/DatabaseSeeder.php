<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        
        $categories = Category::all();

        $recipes = Recipe::factory()
                ->count(20)
                ->for($user)
                ->recycle($categories)
                ->hasAttached(
                    Ingredient::factory()->count(5),
                    ['quantity' => fake()->numberBetween(1, 100),
                    'unit' => fake()->randomElement(['gr', 'ml'])
                    ]
                )
                ->create();

        foreach ($recipes as $recipe) {
        
        $recipe->steps()->create([
            'step_number' => 1,
            'content' => 'Première étape pour ' . $recipe->title,
        ]);

        
        $recipe->steps()->create([
            'step_number' => 2,
            'content' => 'Deuxième étape pour ' . $recipe->title,
        ]);
    }
}}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Category;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
        ->count(3)
        ->has(
            Recipe::factory()
                ->count(3)
                ->hasAttached(Ingredient::factory()->count(5), ['quantity' => 100]) // ajouter 'unit' 
        )
        ->create();
    }
}

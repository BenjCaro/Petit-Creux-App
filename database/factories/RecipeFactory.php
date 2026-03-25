<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $title = fake()->unique()->sentence(3); 

            return [
                'title'       => $title,
                'description' => fake()->paragraph(),
                'difficulty' => fake()->randomElement(\App\Enums\RecipeDifficulty::cases()),
                'slug'        => Str::slug($title), 
                'user_id'     => User::factory(),
                'category_id' => Category::factory(),
                'approved'    => fake()->boolean(80), 
                'duration'    => fake()->numberBetween(15, 120),
            ];
    }
}

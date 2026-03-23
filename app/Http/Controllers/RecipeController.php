<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;

class RecipeController extends Controller
{
    public function show(Recipe $recipe) 
    {
       $recipe->load('ingredients', 'steps');

        return Inertia::render('Recipe' , [
            'recipe' => $recipe
        ]);
    }
}

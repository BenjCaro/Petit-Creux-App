<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index() 
    {   
        $categoriesWithRecipes = Category::select('id', 'name', 'slug')
        ->with(['recipes' => function ($query) {
            $query->select('id', 'category_id', 'title', 'slug')
                ->latest() 
                ->limit(4); 
            }])
        ->get();
            
        $recipeCount = Recipe::count();
    
        return Inertia::render('Home', [
            'title' => 'Bienvenue sur Petit Creux',
            'categories' => $categoriesWithRecipes,
            'count' => $recipeCount
        ]);
    }
}

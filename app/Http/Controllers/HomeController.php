<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index(Request $request) 
    {   

        $query = Recipe::query();
        $search = $request->input('search');

        if ($request->filled('search')) {

            $query->where('title', 'like', "%{$search}%")
            ->orWhereHas('ingredients', function ($q2) use ($search) {
              $q2->where('name', 'like', "%{$search}%");
             });
            $recipes = $query->get();
           // dd($recipes);

        } else {
           
            $recipes = [];
        }

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
            'count' => $recipeCount,
            'recipes' => $recipes,
            'search' => $search
        ]);
    }

}

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

        // Search input
        $query = Recipe::query()->where('approved', true);
        $search = $request->input('search');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhereHas('ingredients', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                }); 
            }); 

            $recipes = $query->paginate(5)->withQueryString();

        } else {
            
            $recipes = Recipe::whereRaw('1 = 0')->paginate(5); // envoie un objet paginator vide 
        }

        // Show latest recipes by cat
        $categoriesWithRecipes = Category::select('id', 'name', 'slug')
        ->with(['recipes' => function ($query) {
            $query->select('id', 'category_id', 'title', 'slug')
                ->where('approved', true)
                ->latest() 
                ->limit(4); 
            }])
        ->get();
            
        $recipeCount = Recipe::where('approved', true)->count();
    
        return Inertia::render('Home', [
            'title' => 'Bienvenue sur Petit Creux',
            'categories' => $categoriesWithRecipes,
            'count' => $recipeCount,
            'recipes' => $recipes,
            'search' => $search
        ]);
    }
}

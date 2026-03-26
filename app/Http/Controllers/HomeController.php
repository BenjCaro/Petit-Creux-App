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

        /**
         * Search Input
         * On construit la requete avec query() qui porte sur le Model Recipe
         */
        $query = Recipe::query()->where('approved', true);
         
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhereHas('ingredients', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                });
            });
        }
       
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->input('difficulty'));
        }

        if (!$request->filled('search') && !$request->filled('category') && !$request->filled('difficulty'))  {
            $recipes = Recipe::whereRaw('1 = 0')->paginate(5);
        } else {
            $recipes = $query->latest()->paginate(5)->withQueryString();
        }

        // Show latest approved recipes by cat
        $categoriesWithRecipes = Category::select('id', 'name', 'slug')
            ->with(['approvedRecipes' => function ($query) {
                $query->select(
                    'id', 
                    'category_id', 
                    'title', 
                    'slug', 
                    'difficulty', 
                    'duration'
                )
                ->latest();
            }])
            ->get();
            
        $recipeCount = Recipe::where('approved', true)->count();
    
        return Inertia::render('Home', [
            'title' => 'Bienvenue sur Petit Creux',
            'categories' => $categoriesWithRecipes,
            'count' => $recipeCount,
            'recipes' => $recipes,
            'filters' => $request->only(['search', 'category', 'difficulty'])
        ]);
    }
}

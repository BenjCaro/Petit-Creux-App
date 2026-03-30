<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Recipe;

class CategoryController extends Controller
{
    public function index() 
    {
         $categoriesWithRecipes = Category::select('id', 'name', 'slug')
            ->withCount('approvedRecipes')
            ->with(['approvedRecipes' => function ($query) {
                $query->select(
                    'id', 
                    'category_id',
                    'title', 
                    'slug', 
                    'difficulty', 
                    'duration'
                )
                ->latest()
                ->limit(8);
            }])
            ->get();
            
        return Inertia::render('Categories', [
            'categories' => $categoriesWithRecipes
        ]);
    }

    public function show(Category $category, Request $request)
    {   

        $query = $category->approvedRecipes();

        if($request->filled('difficulty')) {
            $query->where('difficulty', $request->input('difficulty'));
        }

        $recipes = $query->paginate(12)->onEachSide(1)->withQueryString();
        

        return Inertia::render('Categorie/Category' , [
            'category' => $category,
            'recipes' => $recipes,
            'filters' => $request->only(['difficulty']),
            'total'    => $recipes->total()
        ]);
    }
}
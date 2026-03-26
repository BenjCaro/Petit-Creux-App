<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {
         $categoriesWithRecipes = Category::select('id', 'name', 'slug')
        ->with(['recipes' => function ($query) {
            $query->select('id', 'category_id', 'title', 'slug', 'difficulty', 'duration')
                ->where('approved', true)
                ->latest()
                ->limit(8); 
            }])
        ->get();

        return Inertia::render('Categories', [
            'categories' => $categoriesWithRecipes
        ]);
    }
}
<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Category;

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
                ->latest();
            }])
            ->get();
            
        return Inertia::render('Categories', [
            'categories' => $categoriesWithRecipes
        ]);
    }

    public function show(Category $category)
    {   
        $category->load('approvedRecipes');
        $total = $category->approvedRecipes->count();

        return Inertia::render('Categorie/Category' , [
            'category' => $category,
            'total' => $total
        ]);
    }
}
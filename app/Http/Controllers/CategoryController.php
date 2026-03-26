<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {
         $categoriesWithRecipes = Category::select('id', 'name', 'slug') // L'ID ici est vital
            ->with(['approvedRecipes' => function ($query) {
                $query->select(
                    'id', 
                    'category_id', // <--- S'il manque, approvedRecipes sera toujours vide []
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

        return Inertia::render('Categorie/Category' , [
            'category' => $category
        ]);
    }
}
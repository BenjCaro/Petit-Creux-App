<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() 
    {   
        $categories = Category::select('id', 'name', 'slug')->get();
    
        return Inertia::render('Home', [
            'title' => 'Bienvenue sur Petit Creux',
            'categories' => $categories
        ]);
    }
}

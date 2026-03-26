<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/recettes/{recipe:slug}', [RecipeController::class, 'show'] )->name('recipe');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

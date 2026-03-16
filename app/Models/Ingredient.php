<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\IngredientRecipe;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'type'
    ];

    public function recipe() :BelongsToMany 
    {
        return $this->belongsToMany(Recipe::class)
        ->using(IngredientRecipe::class)
        ->withPivot(['quantity', 'unit']);
    }
}

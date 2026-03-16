<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{

    public $incrementing = true;

    protected $fillable = [
        'quantity',
        'unit'
    ];
}

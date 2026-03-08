<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function recipe() :BelongsToMany 
    {
        return $this->belongsToMany(Recipe::class)->withPivot(['quantity', 'unit']);
    }
}

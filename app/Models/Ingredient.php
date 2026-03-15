<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'type'
    ];

    public function recipe() :BelongsToMany 
    {
        return $this->belongsToMany(Recipe::class)->withPivot(['quantity', 'unit']);
    }
}

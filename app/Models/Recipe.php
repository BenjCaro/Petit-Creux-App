<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\IngredientRecipe;
use App\Enums\RecipeDifficulty;


class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'slug',
        'user_id',
        'category_id',
        'duration',
    ];

    protected $with= ['category'];

    protected $appends = ['difficulty_label'];

    protected function casts(): array 
    {
        return [
            'difficulty' => RecipeDifficulty::class,
            'approved' => 'boolean',
        ];
    }

    protected function difficultyLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->difficulty?->label(), 
        );
    }

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function ingredients() :BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
        ->using(IngredientRecipe::class)
        ->withPivot(['quantity', 'unit']);
    }

    public function posts() :HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function favoris() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favoris');
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

}

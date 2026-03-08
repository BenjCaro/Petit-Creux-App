<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'recipe_id'
    ];

    protected function casts() :array
    {
        return [
            'approved' => 'boolean'
        ];
    }

    public function recipe() :BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

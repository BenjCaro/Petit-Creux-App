<?php

namespace App\Enums;

enum RecipeDifficulty :int {

    case easy = 1;
    case medium = 2;
    case hard = 3;

    public function label() :string
    {
        return match($this) {
            self::easy => 'Facile',
            self::medium => 'Intermédiaire',
            self::hard => 'Difficile',
        };
    }
}
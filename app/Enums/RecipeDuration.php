<?php

namespace App\Enums;

enum RecipeDuration :int {

    case short = 30;
    case medium = 45;
    case long = 60;

    public function label(): string
    {
        return match($this) {
            self::short  => 'Rapide (-30 min)',
            self::medium => 'Moyen (30-60 min)',
            self::long   => 'Long (+60 min)',
        };
    }
}
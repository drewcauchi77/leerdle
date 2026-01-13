<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasSlug;

enum ExerciseLanguage: int
{
    use HasSlug;

    /** Dutch */
    case NL = 1;
    /** French */
    case FR = 2;
}

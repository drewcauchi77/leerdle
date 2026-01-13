<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasSlug;

enum ExerciseSubject: int
{
    use HasSlug;

    case PRESENT = 1;
    case PAST_PERFECT = 2;
    case PAST_IMPERFECT = 3;
}

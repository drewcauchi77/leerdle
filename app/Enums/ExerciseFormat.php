<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\HasSlug;

enum ExerciseFormat: int
{
    use HasSlug;

    /** Fill in the blanks */
    case GAP_ATTACK = 1;
    /** Reorder the sentence */
    case ORDER_DISORDER = 2;
    /** Connecting related terms */
    case WORD_MATES = 3;
}

<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $exercise_id
 * @property-read string $text
 * @property-read string $answer
 * @property-read string $metadata
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Question extends Model
{
    /** @use HasFactory<QuestionFactory> */
    use HasFactory;

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'exercise_id' => 'integer',
            'text' => 'string',
            'answer' => 'string',
            'metadata' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}

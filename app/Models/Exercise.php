<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use Carbon\CarbonInterface;
use Database\Factories\ExerciseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $description
 * @property-read CarbonInterface $available_at
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Exercise extends Model
{
    /** @use HasFactory<ExerciseFactory> */
    use HasFactory;

    /**
     * @return HasMany<Question, $this>
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'title' => 'string',
            'description' => 'string',
            'available_at' => 'datetime',
            'format' => ExerciseFormat::class,
            'language' => ExerciseLanguage::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}

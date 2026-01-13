<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use App\Enums\ExerciseLevel;
use App\Enums\ExerciseSubject;
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
 * @property-read ExerciseFormat $format
 * @property-read ExerciseLanguage $language
 * @property-read ExerciseSubject $subject
 * @property-read ExerciseLevel $level
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
            'subject' => ExerciseSubject::class,
            'level' => ExerciseLevel::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}

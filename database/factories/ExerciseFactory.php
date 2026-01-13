<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use App\Enums\ExerciseLevel;
use App\Enums\ExerciseSubject;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exercise>
 */
final class ExerciseFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(5, true),
            'description' => fake()->sentence(),
            'format' => ExerciseFormat::GAP_ATTACK,
            'language' => ExerciseLanguage::NL,
            'subject' => ExerciseSubject::PRESENT,
            'level' => ExerciseLevel::A1,
            'available_at' => now()->format('Y-m-d'),
        ];
    }
}

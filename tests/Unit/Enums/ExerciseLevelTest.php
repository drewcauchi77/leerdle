<?php

declare(strict_types=1);

use App\Enums\ExerciseLevel;

test('has correct integer values', function (): void {
    expect(ExerciseLevel::A1->value)->toBe(1)
        ->and(ExerciseLevel::A2->value)->toBe(2)
        ->and(ExerciseLevel::B1->value)->toBe(3)
        ->and(ExerciseLevel::B2->value)->toBe(4)
        ->and(ExerciseLevel::C1->value)->toBe(5)
        ->and(ExerciseLevel::C2->value)->toBe(6);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseLevel::from(1))->toBe(ExerciseLevel::A1)
        ->and(ExerciseLevel::from(2))->toBe(ExerciseLevel::A2)
        ->and(ExerciseLevel::from(3))->toBe(ExerciseLevel::B1)
        ->and(ExerciseLevel::from(4))->toBe(ExerciseLevel::B2)
        ->and(ExerciseLevel::from(5))->toBe(ExerciseLevel::C1)
        ->and(ExerciseLevel::from(6))->toBe(ExerciseLevel::C2);
});

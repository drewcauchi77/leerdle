<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;

test('has correct amount of values', function (): void {
    expect(ExerciseFormat::cases())->toHaveLength(3);
});

test('has correct integer values', function (): void {
    expect(ExerciseFormat::GAP_ATTACK->value)->toBe(1)
        ->and(ExerciseFormat::ORDER_DISORDER->value)->toBe(2)
        ->and(ExerciseFormat::WORD_MATES->value)->toBe(3);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseFormat::from(1))->toBe(ExerciseFormat::GAP_ATTACK)
        ->and(ExerciseFormat::from(2))->toBe(ExerciseFormat::ORDER_DISORDER)
        ->and(ExerciseFormat::from(3))->toBe(ExerciseFormat::WORD_MATES);
});

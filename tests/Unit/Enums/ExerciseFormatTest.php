<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;

test('has correct integer values', function (): void {
    expect(ExerciseFormat::GAP_ATTACK->value)->toBe(1);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseFormat::from(1))->toBe(ExerciseFormat::GAP_ATTACK);
});

<?php

declare(strict_types=1);

use App\Enums\ExerciseLanguage;

test('has correct amount of values', function (): void {
    expect(ExerciseLanguage::cases())->toHaveLength(2);
});

test('has correct integer values', function (): void {
    expect(ExerciseLanguage::NL->value)->toBe(1)
        ->and(ExerciseLanguage::FR->value)->toBe(2);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseLanguage::from(1))->toBe(ExerciseLanguage::NL)
        ->and(ExerciseLanguage::from(2))->toBe(ExerciseLanguage::FR);
});

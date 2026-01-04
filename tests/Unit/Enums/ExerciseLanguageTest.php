<?php

declare(strict_types=1);

use App\Enums\ExerciseLanguage;

test('has correct integer values', function (): void {
    expect(ExerciseLanguage::NL->value)->toBe(1);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseLanguage::from(1))->toBe(ExerciseLanguage::NL);
});

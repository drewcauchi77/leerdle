<?php

declare(strict_types=1);

use App\Enums\ExerciseSubject;

test('has correct amount of values', function (): void {
    expect(ExerciseSubject::cases())->toHaveLength(3);
});

test('has correct integer values', function (): void {
    expect(ExerciseSubject::PRESENT->value)->toBe(1)
        ->and(ExerciseSubject::PAST_PERFECT->value)->toBe(2)
        ->and(ExerciseSubject::PAST_IMPERFECT->value)->toBe(3);
});

test('can get enum from integer value', function (): void {
    expect(ExerciseSubject::from(1))->toBe(ExerciseSubject::PRESENT)
        ->and(ExerciseSubject::from(2))->toBe(ExerciseSubject::PAST_PERFECT)
        ->and(ExerciseSubject::from(3))->toBe(ExerciseSubject::PAST_IMPERFECT);
});

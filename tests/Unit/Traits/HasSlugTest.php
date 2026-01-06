<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;

it('converts ExerciseFormat enum name to slug', function (): void {
    expect(ExerciseFormat::GAP_ATTACK->slug())->toBe('gap-attack')
        ->and(ExerciseFormat::ORDER_DISORDER->slug())->toBe('order-disorder');
});

it('finds ExerciseFormat enum from slug', function (): void {
    expect(ExerciseFormat::fromSlug('gap-attack'))->toBe(ExerciseFormat::GAP_ATTACK);
});

it('returns null for non-existent slug in ExerciseFormat', function (): void {
    expect(ExerciseFormat::fromSlug('non-existent'))->toBeNull();
});

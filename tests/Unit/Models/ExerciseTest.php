<?php

declare(strict_types=1);

use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\HasMany;

test('to array', function (): void {
    $exercise = Exercise::factory()->create()->refresh();

    expect(array_keys($exercise->toArray()))
        ->toBe([
            'id',
            'title',
            'description',
            'format',
            'language',
            'level',
            'available_at',
            'created_at',
            'updated_at',
        ]);
});

test('exercise has many questions', function (): void {
    $exercise = Exercise::factory()
        ->has(Question::factory(10))
        ->create();

    expect($exercise->questions)->toHaveCount(10);

    foreach ($exercise->questions as $question) {
        expect($question)->toBeInstanceOf(Question::class);
    }
});

test('exercise has question relationship', function (): void {
    $exercise = new Exercise();

    expect($exercise->questions())
        ->toBeInstanceOf(HasMany::class);
});

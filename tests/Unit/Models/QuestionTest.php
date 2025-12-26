<?php

declare(strict_types=1);

use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

test('to array', function (): void {
    $question = Question::factory()->create()->refresh();

    expect(array_keys($question->toArray()))
        ->toBe([
            'id',
            'exercise_id',
            'text',
            'answer',
            'metadata',
            'created_at',
            'updated_at',
        ]);
});

test('question belongs to exercise', function (): void {
    $exercise = Exercise::factory()->create();
    $question = Question::factory()->create([
        'exercise_id' => $exercise->id,
    ]);

    expect($question->exercise)
        ->toBeInstanceOf(Exercise::class)
        ->id
        ->toBe($exercise->id);
});

test('question has exercise relationship', function (): void {
    $question = new Question();

    expect($question->exercise())
        ->toBeInstanceOf(BelongsTo::class);
});

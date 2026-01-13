<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use App\Enums\ExerciseSubject;
use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('renders page with correct data', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl/exercises/gap-attack/present');

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->component('Exercises/Index')
            ->where('language', 'nl')
            ->where('format', 'gap-attack')
            ->where('subject', 'present')
            ->has('exercises')
        );
});

test('maps all exercises with correct structure', function (): void {
    foreach (ExerciseFormat::cases() as $format) {
        Exercise::factory()->create([
            'language' => ExerciseLanguage::NL,
            'format' => $format,
            'subject' => ExerciseSubject::PRESENT,
        ]);
    }

    /** @var TestCase $this */
    $response = $this->get('/nl/exercises/gap-attack/present');

    $response->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
        ->has('exercises', count(ExerciseFormat::cases()))
        ->has('exercises.0', fn (AssertableInertia $exercise): AssertableInertia => $exercise
            ->has('id')
            ->has('title')
            ->has('description')
            ->has('available_at')
            ->has('format')
            ->has('language')
            ->has('subject')
            ->has('level')
            ->has('created_at')
            ->has('updated_at')
        )
    );

    $page = $response->viewData('page');
    assert(is_array($page));
    assert(array_key_exists('props', $page));
    assert(is_array($page['props']));
    assert(array_key_exists('exercises', $page['props']));
    $exercises = $page['props']['exercises'];

    expect($exercises)->toHaveLength(count(Exercise::all()));
});

/** @phpstan-ignore method.notFound */
test('passes language, format and subject parameters correctly', function (string $language, string $format, string $subject): void {
    /** @var TestCase $this */
    $response = $this->get(sprintf('/%s/exercises/%s/%s', $language, $format, $subject));

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->where('language', $language)
            ->where('format', $format)
            ->where('subject', $subject)
        );
})->with(fn (): array => array_map(
    fn (ExerciseLanguage $case): string => $case->slug(),
    ExerciseLanguage::cases()
))->with(fn (): array => array_map(
    fn (ExerciseFormat $case): string => $case->slug(),
    ExerciseFormat::cases()
))->with(fn (): array => array_map(
    fn (ExerciseSubject $case): string => $case->slug(),
    ExerciseSubject::cases()
));

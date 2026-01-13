<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use App\Enums\ExerciseSubject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('renders page with correct data', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl/exercises/gap-attack');

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->component('Subjects/Index')
            ->where('language', 'nl')
            ->where('format', 'gap-attack')
            ->has('subjects')
        );
});

test('maps all subjects with correct structure', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl/exercises/gap-attack');

    $response->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
        ->has('subjects', count(ExerciseFormat::cases()))
        ->has('subjects.0', fn (AssertableInertia $format): AssertableInertia => $format
            ->has('value')
            ->has('name')
            ->has('slug')
        )
    );

    $page = $response->viewData('page');
    assert(is_array($page));
    assert(array_key_exists('props', $page));
    assert(is_array($page['props']));
    assert(array_key_exists('subjects', $page['props']));
    $subjects = $page['props']['subjects'];
    assert(is_array($subjects));

    expect($subjects)->toHaveLength(count(ExerciseSubject::cases()));

    foreach (ExerciseSubject::cases() as $index => $case) {
        assert(array_key_exists($index, $subjects));
        assert(is_array($subjects[$index]));
        expect($subjects[$index])
            ->toHaveKeys(['value', 'name', 'slug'])
            ->and($subjects[$index]['value'])->toBe($case->value)
            ->and($subjects[$index]['name'])->toBe($case->name)
            ->and($subjects[$index]['slug'])->toBe($case->slug());
    }
});

/** @phpstan-ignore method.notFound */
test('passes language and format parameters correctly', function (string $language, string $format): void {
    /** @var TestCase $this */
    $response = $this->get(sprintf('/%s/exercises/%s', $language, $format));

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->where('language', $language)
            ->where('format', $format)
        );
})->with(fn (): array => array_map(
    fn (ExerciseLanguage $case): string => $case->slug(),
    ExerciseLanguage::cases()
))->with(fn (): array => array_map(
    fn (ExerciseFormat $case): string => $case->slug(),
    ExerciseFormat::cases()
));

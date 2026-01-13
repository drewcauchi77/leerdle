<?php

declare(strict_types=1);

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('renders page with correct data', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl/exercises');

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->component('Formats/Index')
            ->where('language', 'nl')
            ->has('formats')
        );
});

test('maps all formats with correct structure', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl/exercises');

    $response->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
        ->has('formats', count(ExerciseFormat::cases()))
        ->has('formats.0', fn (AssertableInertia $format): AssertableInertia => $format
            ->has('value')
            ->has('name')
            ->has('slug')
        )
    );

    $page = $response->viewData('page');
    assert(is_array($page));
    assert(array_key_exists('props', $page));
    assert(is_array($page['props']));
    assert(array_key_exists('formats', $page['props']));

    $formats = $page['props']['formats'];
    assert(is_array($formats));

    expect($formats)->toHaveLength(count(ExerciseFormat::cases()));

    foreach (ExerciseFormat::cases() as $index => $case) {
        assert(array_key_exists($index, $formats));
        assert(is_array($formats[$index]));
        expect($formats[$index])
            ->toHaveKeys(['value', 'name', 'slug'])
            ->and($formats[$index]['value'])->toBe($case->value)
            ->and($formats[$index]['name'])->toBe($case->name)
            ->and($formats[$index]['slug'])->toBe($case->slug());
    }
});

/** @phpstan-ignore method.notFound */
test('passes language parameter correctly', function (string $language): void {
    /** @var TestCase $this */
    $response = $this->get(sprintf('/%s/exercises', $language));

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->where('language', $language)
        );
})->with(fn (): array => array_map(
    fn (ExerciseLanguage $case): string => $case->slug(),
    ExerciseLanguage::cases()
));

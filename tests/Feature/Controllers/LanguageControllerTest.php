<?php

declare(strict_types=1);

use App\Enums\ExerciseLanguage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('renders page with correct data', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/nl');

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->component('Languages/Show')
            ->where('language', 'nl')
        );
});

/** @phpstan-ignore method.notFound */
test('passes language parameter correctly', function (string $language): void {
    /** @var TestCase $this */
    $response = $this->get('/'.$language);

    $response->assertSuccessful()
        ->assertInertia(fn (AssertableInertia $page): AssertableInertia => $page
            ->where('language', $language)
        );
})->with(fn (): array => array_map(
    fn (ExerciseLanguage $case): string => $case->slug(),
    ExerciseLanguage::cases()
));

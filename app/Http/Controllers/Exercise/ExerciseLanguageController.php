<?php

declare(strict_types=1);

namespace App\Http\Controllers\Exercise;

use App\Enums\ExerciseFormat;
use App\Enums\ExerciseLanguage;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class ExerciseLanguageController extends Controller
{
    public function index(string $language): Response
    {
        return Inertia::render('Exercise/IndexPage', [
            'language' => $language,
            'formats' => collect(ExerciseFormat::cases())->map(fn ($format): array => [
                'value' => $format->value,
                'name' => $format->name,
                'slug' => $format->slug(),
            ]),
        ]);
    }

    public function show(string $language): Response
    {
        return Inertia::render('Exercise/ShowPage', [
            'language' => $language,
        ]);
    }
}

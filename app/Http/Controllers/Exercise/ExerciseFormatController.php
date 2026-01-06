<?php

declare(strict_types=1);

namespace App\Http\Controllers\Exercise;

use App\Enums\ExerciseSubject;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class ExerciseFormatController extends Controller
{
    public function show(string $language, string $format): Response
    {
        return Inertia::render('Exercise/ShowFormatPage', [
            'language' => $language,
            'format' => $format,
            'subjects' => collect(ExerciseSubject::cases())->map(fn ($format): array => [
                'value' => $format->value,
                'name' => $format->name,
                'slug' => $format->slug(),
            ]),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ExerciseFormat;
use Inertia\Inertia;
use Inertia\Response;

final class FormatController extends Controller
{
    public function index(string $language): Response
    {
        return Inertia::render('Formats/Index', [
            'language' => $language,
            'formats' => collect(ExerciseFormat::cases())->map(fn (ExerciseFormat $format): array => [
                'value' => $format->value,
                'name' => $format->name,
                'slug' => $format->slug(),
            ]),
        ]);
    }
}

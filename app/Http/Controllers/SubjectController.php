<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ExerciseSubject;
use Inertia\Inertia;
use Inertia\Response;

final class SubjectController extends Controller
{
    public function index(string $language, string $format): Response
    {
        return Inertia::render('Subjects/Index', [
            'language' => $language,
            'format' => $format,
            'subjects' => collect(ExerciseSubject::cases())->map(fn (ExerciseSubject $subject): array => [
                'value' => $subject->value,
                'name' => $subject->name,
                'slug' => $subject->slug(),
            ]),
        ]);
    }
}

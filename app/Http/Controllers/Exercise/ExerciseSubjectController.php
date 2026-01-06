<?php

declare(strict_types=1);

namespace App\Http\Controllers\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Inertia\Inertia;
use Inertia\Response;

final class ExerciseSubjectController extends Controller
{
    public function show(string $language, string $format, string $subject): Response
    {
        return Inertia::render('Exercise/ShowSubjectPage', [
            'language' => $language,
            'format' => $format,
            'subject' => $subject,
            'exercises' => Exercise::all(),
        ]);
    }
}

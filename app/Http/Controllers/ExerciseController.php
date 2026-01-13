<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Exercise;
use Inertia\Inertia;
use Inertia\Response;

final class ExerciseController extends Controller
{
    public function index(string $language, string $format, string $subject): Response
    {
        return Inertia::render('Exercises/Index', [
            'language' => $language,
            'format' => $format,
            'subject' => $subject,
            'exercises' => Exercise::all(),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

final class LanguageController extends Controller
{
    public function show(string $language): Response
    {
        return Inertia::render('Languages/Show', [
            'language' => $language,
        ]);
    }
}

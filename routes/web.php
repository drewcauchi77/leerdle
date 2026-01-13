<?php

declare(strict_types=1);

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Home', []))->name('home');

Route::get('/{language}', [LanguageController::class, 'show'])->name('languages.show');
Route::get('/{language}/exercises', [FormatController::class, 'index'])->name('formats.index');
Route::get('/{language}/exercises/{format}', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/{language}/exercises/{format}/{subject}', [ExerciseController::class, 'index'])->name('exercises.index');

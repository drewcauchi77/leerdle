<?php

declare(strict_types=1);

use App\Http\Controllers\Exercise\ExerciseFormatController;
use App\Http\Controllers\Exercise\ExerciseLanguageController;
use App\Http\Controllers\Exercise\ExerciseSubjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Home', []))->name('home');

Route::get('/{language}', [ExerciseLanguageController::class, 'show'])->name('languages.show');
Route::get('/{language}/exercises', [ExerciseLanguageController::class, 'index'])->name('exercises.index');
Route::get('/{language}/exercises/{format}', [ExerciseFormatController::class, 'show'])->name('formats.show');
Route::get('/{language}/exercises/{format}/{subject}', [ExerciseSubjectController::class, 'show'])->name('subjects.show');

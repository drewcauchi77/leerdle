<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/test', fn (Request $request) => response()->json(['message' => 'Hello from API']));

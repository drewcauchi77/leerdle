<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exercise_id')->constrained();
            $table->text('text');
            $table->string('answer');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }
};

<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('format');
            $table->integer('language');
            $table->integer('level');
            $table->date('available_at');
            $table->timestamps();
        });
    }
};

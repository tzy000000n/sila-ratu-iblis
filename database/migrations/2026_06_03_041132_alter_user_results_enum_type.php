<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('user_results');
        Schema::create('user_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // 'quiz', 'simulasi', 'materi'
            $table->string('reference_id');
            $table->integer('score');
            $table->integer('max_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // cannot reverse safely without data loss, but we can recreate with old enum
        Schema::dropIfExists('user_results');
        Schema::create('user_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['quiz', 'simulasi']);
            $table->string('reference_id');
            $table->integer('score');
            $table->integer('max_score');
            $table->timestamps();
        });
    }
};

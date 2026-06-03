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
        Schema::create('simulasi_kasuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('sender_name');
            $table->string('sender_address');
            $table->string('subject');
            $table->longText('body');
            $table->string('action_text');
            $table->string('action_subtext');
            $table->text('quote');
            $table->text('signoff');
            $table->text('tip');
            $table->json('options'); // json array of choices
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulasi_kasuses');
    }
};

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
        Schema::create('timeline', function (Blueprint $table) {
            $table->id()->unique();
            $table->uuid('slug')->unique();
            $table->string('judul');
            $table->string('content');
            $table->boolean('is_video')->default(false);
            $table->boolean('is_muted')->default(false);
            $table->foreignId('music_id')->nullable(true);
            $table->foreignId('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeline');
    }
};

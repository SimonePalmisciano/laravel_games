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
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained();
            $table->string('slug')->unique();
            $table->string('title', 100);
            $table->text('description');
            $table->longText('cover_image')->nullable();
            $table->decimal('price', 8, 2);
            $table->date('release_date')->nullable();
            $table->string('developer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videogames');
    }
};

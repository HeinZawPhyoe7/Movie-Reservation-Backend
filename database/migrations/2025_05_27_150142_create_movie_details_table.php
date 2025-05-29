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
        Schema::create('movie_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->json('images');
            $table->string('genre');
            $table->string('cinema_name');
            $table->string('cinema_place');
            $table->string('period_of_time');
            $table->string('show_day');
            $table->string('first_time')->nullable();
            $table->string('second_time')->nullable();
            $table->string('third_time')->nullable();
            $table->string('fourth_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_details');
    }
};

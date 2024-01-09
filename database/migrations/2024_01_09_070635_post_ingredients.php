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
        Schema::create('post_ingredients', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('amount')->nullable();
            $table->string('measurement')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_ingredient');
    }
};

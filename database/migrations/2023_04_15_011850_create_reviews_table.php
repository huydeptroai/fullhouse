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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->integer('rating')->nullable();

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->string('product_id', 10);
            $table->foreign('product_id', 'reviews_product_id_FK')->references('product_id')->on('products')->cascadeOnUpdate()->restrictOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->Integer('quantity');

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->string('product_id', 10);
            $table->foreign('product_id')->references('product_id')->on('products')->cascadeOnUpdate()->restrictOnDelete();
            
            $table->softDeletes(); //delete_at=0, for sort-delete record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

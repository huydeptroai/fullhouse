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
        Schema::create('order_details', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders')->cascadeOnUpdate()->restrictOnDelete();

            $table->string('product_id', 10);
            $table->foreign('product_id', 'order_detail_product_id_FK')->references('product_id')->on('products')->cascadeOnUpdate()->restrictOnDelete();
            $table->primary(['order_id', 'product_id']);

            $table->decimal('price', 8, 2)->comment('product[price-discount]');
            $table->integer('quantity');

            $table->softDeletes(); //delete_at=0, for sort-delete record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 10)->primary();
            $table->string('product_name', 100);
            $table->string('product_slug', 100);

            $table->string('product_material')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->longText('product_description')->nullable();

            $table->decimal('product_price', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            
            $table->integer('product_quantity')->default('0')->nullable();

            $table->tinyInteger('featured')->nullable()->comment('1: featured');

            $table->string('category_id', 10);
            $table->foreign('category_id', 'products_category_id_FK')->references('category_id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();;


            $table->softDeletes(); //delete_at=0, for sort-delete record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

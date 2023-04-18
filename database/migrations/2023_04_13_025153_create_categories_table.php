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
        Schema::create('categories', function (Blueprint $table) {
            $table->string('category_id', 10)->primary();
            $table->string('category_name_1', 100);
            $table->string('category_name_2', 100);
            $table->string('category_slug', 100);
            $table->string('category_image')->nullable();
            $table->text('category_intro')->nullable();

            $table->softDeletes(); //delete_at=0, for sort-delete record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

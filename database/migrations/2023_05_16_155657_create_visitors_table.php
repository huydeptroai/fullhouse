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
        Schema::create('visitors', function (Blueprint $table) {
            $table->integer('hits')->default(0);
            $table->string('ip')->nullable();
            $table->timestamp('date_visited')->nullable()->useCurrent();
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id_fk');
            
            $table->foreign('user_id', 'user_id_fk')->references('id')->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};

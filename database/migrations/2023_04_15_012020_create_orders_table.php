<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('order_date')->default(Carbon::now());

            $table->string('receiver_name',30);
            $table->string('receiver_phone',15);
            $table->string('shipping_address',50);
            $table->string('shipping_district',30);
            $table->string('shipping_city',30);
            $table->decimal('shipping_fee',8,2)->nullable();

            $table->tinyInteger('payment_method')->default(0)->comment('0:COD, 1: bank');

            $table->text('note')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->string('approved_by')->nullable();

            $table->foreignId('user_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained();

            $table->softDeletes(); //delete_at=0, for sort-delete record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

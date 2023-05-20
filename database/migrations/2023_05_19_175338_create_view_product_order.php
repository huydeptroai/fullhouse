<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewProductData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP VIEW IF EXISTS view_product_data');
        DB::unprepared(
            "CREATE VIEW view_product_order AS
            SELECT 
                products.*, 
                (product_price - discount) AS price, 
                (SELECT count(*) FROM reviews WHERE reviews.product_id = products.product_id) AS count_review,
                (SELECT AVG(rating) FROM reviews WHERE reviews.product_id = products.product_id) AS avg_rating,
                (SELECT count(*) FROM order_details WHERE order_details.product_id = products.product_id) AS count_order,
                (SELECT sum(quantity) FROM order_details WHERE order_details.product_id = products.product_id) AS quantity_sell,
                (SELECT sum(quantity*price) FROM order_details WHERE order_details.product_id = products.product_id) AS amount_sell
            FROM products
        ");
    }
   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_product_order');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchants', function (Blueprint $table) {
          
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_promos', function (Blueprint $table) {
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        Schema::table('flash_sale_products', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('cascade');
        });
        
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('id')->on('transaction_headers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            // $table->primary(['transaction_id', "product_id", "variant_id"]);
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
        });
        
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        Schema::table('electric_transaction_details', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('id')->on('transaction_headers')->onDelete('cascade');
            // $table->primary('transaction_id');
        });

        Schema::table('roomables', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            // $table->primary('room_id');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transaction_headers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        Schema::table('review_videos', function (Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });

        Schema::table('review_images', function (Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });

        Schema::table('review_replies', function (Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

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
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('merchant_id')->nullable()->references('id')->on('merchants')->onDelete('cascade');
            $table->foreignId('product_category_id')->nullable()->references('id')->on('product_categories')->onDelete('cascade');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_promos', function (Blueprint $table) {
            $table->foreignId('promo_id')->nullable()->references('id')->on('promos')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('flash_sale_products', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->references('id')->on('product_variants')->onDelete('cascade');
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->nullable()->references('id')->on('transaction_headers')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->references('id')->on('product_variants')->onDelete('cascade');
            $table->foreignId('shipment_id')->nullable()->references('id')->on('shipments')->onDelete('cascade');
        });

        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('location_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
        });

        Schema::table('electric_transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->nullable()->references('id')->on('transaction_headers')->onDelete('cascade');
        });

        Schema::table('roomables', function (Blueprint $table) {
            $table->foreignId('room_id')->nullable()->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('room_id')->nullable()->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('transaction_id')->nullable()->references('id')->on('transaction_headers')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('review_videos', function (Blueprint $table) {
            $table->foreignId('review_id')->nullable()->references('id')->on('reviews')->onDelete('cascade');
        });

        Schema::table('review_images', function (Blueprint $table) {
            $table->foreignId('review_id')->nullable()->references('id')->on('reviews')->onDelete('cascade');
        });

        Schema::table('review_replies', function (Blueprint $table) {
            $table->foreignId('review_id')->nullable()->references('id')->on('reviews')->onDelete('cascade');
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

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
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreignId('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_promos', function (Blueprint $table) {
            $table->foreignId('promo_id')->references('id')->on('promos')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
        Schema::table('flash_sale_products', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            $table->primary(['user_id', 'variation_id', 'product_id']);
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

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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->string('transaction_id');
            $table->string('product_id');
            $table->string('variant_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('shipment_id');
            $table->string('status');
            $table->string('promo_name');
            $table->integer('discount');
            $table->integer('total_paid');
            $table->timestamps();

            $table->primary(['transaction_id', 'variant_id', 'product_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};

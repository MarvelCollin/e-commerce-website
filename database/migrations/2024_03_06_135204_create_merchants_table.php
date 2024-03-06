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
        Schema::create('merchants', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('status');
            $table->string('image');
            $table->string('catch_phrase');
            $table->string('process_time');
            $table->string('operational_time');
            $table->string('banner_image');
            $table->string('description');
            $table->string('full_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};

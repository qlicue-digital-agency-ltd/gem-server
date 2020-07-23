<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('trade_products', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('name');
    //         $table->text('image');
    //         $table->integer('price');
    //         $table->string('description');
    //         $table->integer('user_id');
    //         $table->string('contacts');
    //         $table->string('status');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_products');
    }
}

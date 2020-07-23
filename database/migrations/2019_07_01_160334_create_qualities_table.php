<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('qualities', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('race');
    //         $table->string('tribe');
    //         $table->string('religion');
    //         $table->string('hobby');
    //         $table->integer('height');
    //         $table->string('color');
    //         $table->string('education');
    //         $table->string('job');
    //         $table->string('body');
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
        Schema::dropIfExists('qualities');
    }
}

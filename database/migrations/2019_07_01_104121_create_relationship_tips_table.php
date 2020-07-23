<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('relationship_tips', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('title');
    //         $table->string('subject');
    //         $table->text('description');
    //         $table->string('image');
    //         $table->text('liked_by');
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
        Schema::dropIfExists('relationship_tips');
    }
}

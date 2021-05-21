<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival', function (Blueprint $table) {
           
            $table->bigInteger('religion_id');
            $table->Increments('festival_id');
            $table->string('festival_name')->unique();
            $table->longText('festival_desc');
            $table->longText('festival_procedure');
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
        Schema::dropIfExists('festival');
    }
}

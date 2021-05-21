<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubreligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subreligions', function (Blueprint $table) {
            $table->bigInteger('festival_id');
            $table->Increments('subreligion_id');
            $table->string('subreligion_name');
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
        Schema::dropIfExists('subreligions');
    }
}

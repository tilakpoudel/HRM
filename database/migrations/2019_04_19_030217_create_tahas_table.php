<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ministry_id');
            $table->integer('nirdeshanalaya_id');
            $table->integer('karyalaya_id');
            $table->string('taha_name');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('tahas');
    }
}

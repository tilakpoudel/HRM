<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('gender');
            $table->date('dob');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('spouse_name');
            $table->integer('ministry_id');
            $table->integer('nir_id');
            $table->integer('kar_id');
            $table->integer('taha_id');
            $table->integer('shreni_id');
            $table->integer('pad_id');
            $table->date('hire_date');
            $table->string('emp_type');
            $table->tinyInteger('emp_status');
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
        Schema::dropIfExists('employees');
    }
}

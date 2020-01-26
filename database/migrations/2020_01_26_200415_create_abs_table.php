<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stu_id')->unsigned();
            $table->bigInteger('absence')->nullable();
            $table->foreign('stu_id')->references('id')->on('students');
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
        Schema::dropIfExists('abs');
    }
}

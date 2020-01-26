<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('birthdate');
            $table->string('backSchool')->nullable();
            $table->string('address');
            $table->string('FrontNationalityPhoto')->nullable();
            $table->string('BackNationalityPhoto')->nullable();
            $table->string('FrontHousingCard')->nullable();
            $table->string('BackHousingCard')->nullable();
            $table->string('NationalityCertificate')->nullable();
            $table->bigInteger('Payment')->nullable()->default(0);
            $table->string('grade_img')->nullable();
            $table->string('RationCard')->nullable();
            $table->unsignedBigInteger('father_id')->unsigned();
            $table->unsignedBigInteger('class_id')->unsigned();
            $table->foreign('father_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}

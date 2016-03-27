<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('profile');
            $table->string('study_title')->nullable();
            $table->string('wage_aspiration')->nullable();

            $table->timestamps();

            $table->integer('jobseeker_id')->unsigned();
            $table->foreign('jobseeker_id')->references('user_id')->on('jobseekers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resumes');
    }
}

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
            $table->text('skills')->nullable();
            $table->string('study_title')->nullable();
            $table->string('wage_aspiration')->nullable();
            $table->string('vaccines')->nullable();
            $table->integer('experience')->default(0);

            $table->timestamps();

            $table->integer('occupation_id')->unsigned()->nullable();
            $table->foreign('occupation_id')->references('id')->on('occupations');

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

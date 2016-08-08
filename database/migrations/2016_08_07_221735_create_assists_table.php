<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->date('assist_at');

            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')->on('activities');

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
        Schema::drop('assists');
    }
}

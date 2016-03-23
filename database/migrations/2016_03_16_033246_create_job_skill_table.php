<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skill', function (Blueprint $table) {
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');

            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills');

            $table->primary(['job_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_skill');
    }
}

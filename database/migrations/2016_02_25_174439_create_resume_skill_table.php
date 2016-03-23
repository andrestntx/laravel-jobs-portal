<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_skill', function (Blueprint $table) {
            $table->integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');

            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills');

            $table->primary(['resume_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resume_skill');
    }
}

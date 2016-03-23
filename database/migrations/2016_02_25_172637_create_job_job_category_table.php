<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobJobCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_job_category', function ($table) {
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');

            $table->integer('job_category_id')->unsigned();
            $table->foreign('job_category_id')->references('id')->on('job_categories');

            $table->primary(['job_id', 'job_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_job_category');
    }
}

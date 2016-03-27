<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('institution');
            $table->text('notes')->nullable();
            $table->date('init')->nullable();
            $table->date('finish')->nullable();

            $table->integer('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('resumes');

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
        Schema::drop('studies');
    }
}

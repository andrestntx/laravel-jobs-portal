<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {

            $table->string('email')->unique();
            $table->string('doc')->unique();
            $table->string('doc_type')->default('cc');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->enum('sex', ['M', 'F']);

            $table->string('geo_location_id')->nullable();
            $table->foreign('geo_location_id')->references('id')->on('geo_locations');

            $table->integer('user_id')->unsigned()->primary();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('jobseekers');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit')->unique();
            $table->string('name')->unique();
            $table->string('email');
            $table->string('description')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('email_new_job')->default(false);
            
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('geo_location_id')->nullable();
            $table->foreign('geo_location_id')->references('id')->on('geo_locations');

            $table->integer('company_category_id')->unsigned()->nullable();
            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}

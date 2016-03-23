<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_locations', function (Blueprint $table) {

            $table->string('id')->primary();

            $table->string('name')->nullable();
            $table->string('point_of_interest')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('location')->nullable();
            $table->string('formatted_address')->nullable();
            $table->string('bounds')->nullable();
            $table->string('viewport')->nullable();
            $table->string('route')->nullable();
            $table->string('street_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('locality')->nullable();
            $table->string('sublocality')->nullable();
            $table->string('country')->nullable();
            $table->string('country_short')->nullable();
            $table->string('administrative_area_level_1')->nullable();
            $table->string('place_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('url')->nullable();
            $table->string('website')->nullable();

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
        Schema::drop('geo_locations');
    }
}

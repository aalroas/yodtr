<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');



            $table->string('name_en');
            $table->string('name_tr');
            $table->string('name_ar');


            $table->text('overview_en');
            $table->text('overview_tr');
            $table->text('overview_ar');

            $table->string('slug');



            $table->string('city_en');
            $table->string('city_tr');
            $table->string('city_ar');

            $table->string('location_en');
            $table->string('location_tr');
            $table->string('location_ar');

            $table->string('meta_description_en');
            $table->string('meta_keywords_en');

            $table->string('meta_description_tr');
            $table->string('meta_keywords_tr');

            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');


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
        Schema::dropIfExists('clubs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();

            $table->string('video_url')->nullable();

            $table->string('name_en')->nullable();
            $table->string('name_tr')->nullable();
            $table->string('name_ar');

            $table->string('slug');
            $table->string('founded_year')->nullable();
            $table->string('students_count')->nullable();
            $table->integer('city_id')->nullable();

            $table->text('overview_en')->nullable();
            $table->text('overview_tr')->nullable();
            $table->text('overview_ar')->nullable();

            $table->string('website_url')->nullable();

            $table->text('contact_details_en')->nullable();
            $table->text('contact_details_tr')->nullable();
            $table->text('contact_details_ar')->nullable();

            $table->integer('show_in_home')->default(0);
            $table->integer('branch_id');

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
        Schema::dropIfExists('universities');
    }
}

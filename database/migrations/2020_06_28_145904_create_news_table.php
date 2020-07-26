<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image');

            $table->string('video_url')->nullable();;

            $table->string('title_en')->nullable();
            $table->string('title_tr')->nullable();
            $table->string('title_ar');

            $table->string('slug');

            $table->text('overview_en')->nullable();
            $table->text('overview_tr')->nullable();
            $table->text('overview_ar');

            $table->text('body_en')->nullable();
            $table->text('body_tr')->nullable();
            $table->text('body_ar');

            $table->string('meta_description_en')->nullable();
            $table->string('meta_keywords_en')->nullable();

            $table->string('meta_description_tr')->nullable();
            $table->string('meta_keywords_tr')->nullable();

            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');

            $table->integer('status')->default(1);
            $table->integer('show_in_home')->default(0);
            $table->integer('branch_id')->default(0);
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
        Schema::dropIfExists('news');
    }
}

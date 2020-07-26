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

            $table->string('video_url');

            $table->string('title_en');
            $table->string('title_tr');
            $table->string('title_ar');

            $table->string('slug');



            $table->text('overview_en');
            $table->text('overview_tr');
            $table->text('overview_ar');


            $table->text('body_en');
            $table->text('body_tr');
            $table->text('body_ar');

            $table->string('meta_description_en');
            $table->string('meta_keywords_en');

            $table->string('meta_description_tr');
            $table->string('meta_keywords_tr');

            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');

            $table->integer('status')->default(1);
            $table->integer('show_in_home')->default(0);
            $table->integer('branch_id');
            $table->integer('user_id');


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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');



            $table->string('name_en');
            $table->string('name_tr');
            $table->string('name_ar');


            $table->string('author_name_en');
            $table->string('author_name_tr');
            $table->string('author_name_ar');

            $table->string('translator_name_en');
            $table->string('translator_name_tr');
            $table->string('translator_name_ar');

            $table->text('overview_en');
            $table->text('overview_tr');
            $table->text('overview_ar');

            $table->string('slug');

            $table->string('language_id');
            $table->string('club_id');

            $table->string('page_count');

            $table->string('meta_description_en');
            $table->string('meta_keywords_en');

            $table->string('meta_description_tr');
            $table->string('meta_keywords_tr');

            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');

            $table->integer('status')->default(1);
            $table->integer('show_in_home')->default(0);

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
        Schema::dropIfExists('books');
    }
}

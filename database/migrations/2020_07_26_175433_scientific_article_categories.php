<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScientificArticleCategories extends Migration
{
    public function up()
    {
        Schema::create('scientific_article_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scientific_article_id')->unsigned();
            $table->foreign('scientific_article_id')->references('id')->on('scientific_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('scientific_article_categories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScientificArticleTags extends Migration
{
    public function up()
    {
        Schema::create('scientific_article_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scientific_article_id')->unsigned();
            $table->foreign('scientific_article_id')->references('id')->on('scientific_articles')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('scientific_article_tags');
    }
}

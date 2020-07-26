<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('title_en');
            $table->string('title_tr');
            $table->string('title_ar');

            $table->string('text_en');
            $table->string('text_tr');
            $table->string('text_ar');

            $table->string('url');
            $table->integer('show_in_home')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('sliders');
    }
}

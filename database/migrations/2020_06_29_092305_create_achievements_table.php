<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image')->nullable();

            $table->string('student_name_en')->nullable();
            $table->string('student_name_ar');
            $table->string('student_name_tr')->nullable();

            $table->string('title_en')->nullable();
            $table->string('title_tr')->nullable();
            $table->string('title_ar');

            $table->string('slug');

            $table->string('url')->nullable();


            $table->text('body_en')->nullable();
            $table->text('body_tr')->nullable();
            $table->text('body_ar');



            $table->integer('status')->default(1);
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
        Schema::dropIfExists('achievements');
    }
}

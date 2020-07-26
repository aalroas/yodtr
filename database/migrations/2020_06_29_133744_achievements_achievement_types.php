<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AchievementsAchievementTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements_achievement_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('achievement_id')->unsigned();
            $table->foreign('achievement_id')->references('id')->on('achievements')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('achievement_type_id')->unsigned();
            $table->foreign('achievement_type_id')->references('id')->on('achievement_types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('achievements_achievement_types');
    }
}

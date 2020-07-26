<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();

            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->text('slug')->nullable();

            $table->text('name_ar');
            $table->text('name_en')->nullable();
            $table->text('name_tr')->nullable();

            $table->Text('body_tr')->nullable();
            $table->Text('body_en')->nullable();
            $table->Text('body_ar');

            $table->string('location_ar');
            $table->string('location_tr');
            $table->string('location_en');

            $table->string('url');
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
        Schema::dropIfExists('events');
    }
}

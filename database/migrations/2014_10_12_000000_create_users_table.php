<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();

            $table->string('first_name_tr')->nullable();
            $table->string('last_name_tr')->nullable();

            $table->string('first_name_ar');
            $table->string('last_name_ar');

            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender');


            $table->string('about_me_en')->nullable();
            $table->string('about_me_tr')->nullable();
            $table->string('about_me_ar')->nullable();

            $table->string('phone_number');
            $table->string('identity_image');
            $table->string('identity_number');

            $table->integer('city_id');

            $table->string('address_en')->nullable();
            $table->string('address_tr')->nullable();
            $table->string('address_ar')->nullable();

            $table->integer('branch_id');

            $table->string('position_en')->nullable();
            $table->string('position_tr')->nullable();
            $table->string('position_ar')->nullable();

            $table->integer('status')->default(1);
            $table->integer('is_deleted')->default(0);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

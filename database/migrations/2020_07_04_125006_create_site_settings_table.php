<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id');
            $table->string('site_title_en')->nullable();
            $table->string('site_title_tr')->nullable();
            $table->string('site_title_ar')->nullable();

            $table->string('site_icon_en')->nullable();
            $table->string('site_logo_en')->nullable();
            $table->string('site_icon_tr')->nullable();
            $table->string('site_logo_tr')->nullable();
            $table->string('site_icon_ar')->nullable();
            $table->string('site_logo_ar')->nullable();

            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();

            $table->string('site_address_en')->nullable();
            $table->string('site_address_tr')->nullable();
            $table->string('site_address_ar')->nullable();

            $table->string('site_mobile')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_fax')->nullable();

            $table->string('site_whatsapp_url')->nullable();
            $table->string('site_instagram_url')->nullable();
            $table->string('site_facebook_url')->nullable();
            $table->string('site_twitter_url')->nullable();
            $table->string('site_linkedin_url')->nullable();
            $table->string('site_youtube_url')->nullable();


            $table->string('copy_right_en')->nullable();
            $table->string('copy_right_tr')->nullable();
            $table->string('copy_right_ar')->nullable();

            $table->string('meta_description_en');
            $table->string('meta_keywords_en');

            $table->string('meta_description_tr');
            $table->string('meta_keywords_tr');

            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');
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
        Schema::dropIfExists('site_settings');
    }
}

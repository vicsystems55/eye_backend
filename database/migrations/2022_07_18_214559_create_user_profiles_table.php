<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('social_link')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->longText('bio')->nullable();
            $table->string('language')->nullable();
            $table->string('level_education')->nullable();
            $table->string('existing_business')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_registration_status')->nullable();
            $table->string('years_in_business')->nullable();
            $table->string('gross_revenue')->nullable();
            $table->string('industry')->nullable();
            $table->longText('business_description')->nullable();
            $table->longText('business_problems')->nullable();
            $table->string('in_partnership')->nullable();
            $table->string('seeking_cofounder')->nullable();
            $table->string('business_industry')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('other_challenges')->nullable();
            $table->longText('hope_to_gain')->nullable();
            $table->string('status')->default('active');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_profiles');
    }
}

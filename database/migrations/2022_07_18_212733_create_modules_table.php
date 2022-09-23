<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('featured_image')->default(config('app.url').'/featured_images/default.png');
            $table->string('module_code');
          
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('course_body')->nullable();
            $table->string('status')->default('inactive');

            $table->bigInteger('running_session_id')->unsigned()->nullable();


            $table->bigInteger('quizz_id')->unsigned()->nullable();

            $table->foreign('quizz_id')->references('id')->on('quizzs');

            $table->foreign('running_session_id')->references('id')->on('eye_sessions');
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
        Schema::dropIfExists('modules');
    }
}

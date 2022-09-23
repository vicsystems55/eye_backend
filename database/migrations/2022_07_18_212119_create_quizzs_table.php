<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('quizzs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->longText('question');
            $table->string('answer')->nullable();
            $table->longText('a');
            $table->longText('b');
            $table->longText('c');
            $table->longText('d');
            $table->longText('e');
            $table->string('duration');
            $table->bigInteger('module_id')->unsigned()->nullable(); 
            $table->foreign('module_id')->references('id')->on('modules');    
            $table->timestamps();
        });
        
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzs');
    }
}

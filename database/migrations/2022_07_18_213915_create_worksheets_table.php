<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('worksheets', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('module_id')->unsigned();
            $table->string('worksheet_code');
            $table->string('theme')->nullable();
            $table->string('exercise')->nullable();
            $table->string('category')->nullable();
            $table->string('question_type')->nullable();
            $table->longText('question')->nullable();
            $table->longText('description')->nullable();
            $table->longText('prefered_answer')->nullable();
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
        Schema::dropIfExists('worksheets');
    }
}

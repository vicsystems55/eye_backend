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
            $table->id();
            $table->string('name');
            $table->string('usercode');
            $table->string('role');
            $table->string('otp')->nullable();

            $table->boolean('stage1')->default(0);

            $table->string('avatar')->default(config('app.url').'avatars/default.png');


            $table->boolean('stage2')->default(0);
            $table->boolean('stage3')->default(0);
            $table->boolean('stage4')->default(0);

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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

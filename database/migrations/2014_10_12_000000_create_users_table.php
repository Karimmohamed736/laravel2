<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //laravel data that put in your database 
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        //after upload tha data, now u can add users in register page and enjoy
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

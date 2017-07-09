<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatatbase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_by');
            $table->string('title');
            $table->string('content');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('created_by')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('news');
    }
}

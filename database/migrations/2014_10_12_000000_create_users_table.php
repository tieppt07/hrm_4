<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('role')->default(0);
            $table->integer('position_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('status')->default(1);
            $table->string('place_of_birth')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone')->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

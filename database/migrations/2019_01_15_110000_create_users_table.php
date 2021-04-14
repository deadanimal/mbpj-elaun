<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('CUSTOMERID');
            $table->string('USERID');
            $table->string('USERNAME');
            $table->string('DEPARTMENTCODE')->default('-');
            $table->string('NIRC');
            $table->string('NAME');
            $table->string('MOBILE_PHONE');
            $table->string('email')->unique();
            $table->unsignedInteger('role_id')->default(8);
            $table->unsignedInteger('is_oncall')->default(0);
            $table->rememberToken();
            $table->string('password')->default(Hash::make('secret'));
            $table->string('status',2)->default('01');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
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

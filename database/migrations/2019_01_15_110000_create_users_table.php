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
            $table->float('GAJI')->default(1000.00);
            $table->string('email')->unique();
            $table->unsignedInteger('role_id')->default(8);
            $table->unsignedInteger('GE_KOD_JABATAN')->default(1);
            $table->unsignedInteger('is_oncall')->default(0);
            $table->rememberToken();
            $table->string('password')->default(Hash::make('secret'));
            $table->string('status',2)->default('01');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('GE_KOD_JABATAN')->references('GE_KOD_JABATAN')->on('jabatans');
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

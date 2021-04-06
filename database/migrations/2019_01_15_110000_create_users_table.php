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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('GE_KOD_JABATAN');
            $table->float('gaji');
            $table->rememberToken();
            $table->timestamps();
            $table->string('status',2)->default('01');

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

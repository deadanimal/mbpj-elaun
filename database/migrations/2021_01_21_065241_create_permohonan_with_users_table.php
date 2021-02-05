<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanWithUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('permohonan_with_users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permohonan_baru');
            $table->unsignedInteger('id');
        });

        Schema::table('permohonan_with_users', function($table) {
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_permohonan_baru')->references('id_permohonan_baru')->on('permohonan_barus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_with_users');
    }
}

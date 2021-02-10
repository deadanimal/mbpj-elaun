<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id('id_catatan');
            $table->string('catatan');
            $table->string('status');
            $table->unsignedInteger('is_kemaskini');
            $table->string('masa');
            $table->unsignedInteger('id_user');
            $table->unsignedBigInteger('id_permohonan_baru');
            $table->timestamps();
        });

        Schema::table('catatans', function($table) {
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('catatans');
    }
}

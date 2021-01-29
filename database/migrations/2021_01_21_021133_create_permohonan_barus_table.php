<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanBarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_barus', function (Blueprint $table) {
            $table->bigIncrements('id_permohonan_baru');
            $table->string('tarikh_permohonan');
            $table->string('masa_mula');
            $table->string('masa_akhir');
            $table->string('masa');
            $table->string('hari');
            $table->string('waktu');
            $table->string('kadar_jam');
            $table->string('tujuan');
            $table->string('status');
            $table->unsignedInteger('id_penyelia')->default('0');
            $table->unsignedInteger('id_ketua_bahagian');
            $table->unsignedInteger('id_ketua_jabatan');
            $table->unsignedInteger('id_kerani_pemeriksa');
            $table->unsignedInteger('id_kerani_semakan');
            $table->timestamps();
        });

        Schema::table('permohonan_barus', function($table) {
            $table->foreign('id_penyelia')->references('id')->on('users');
            $table->foreign('id_ketua_bahagian')->references('id')->on('users');
            $table->foreign('id_ketua_jabatan')->references('id')->on('users');
            $table->foreign('id_kerani_pemeriksa')->references('id')->on('users');
            $table->foreign('id_kerani_semakan')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_barus');
    }
}

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
            $table->string('tarikh_mula_kerja');
            $table->string('tarikh_akhir_kerja');
            $table->string('masa_mula');
            $table->string('masa_akhir');
            $table->string('masa');
            $table->string('hari');
            $table->string('waktu');
            $table->string('kadar_jam');
            $table->string('lokasi')->default('-');
            $table->string('tujuan');
            $table->string('status');
            $table->string('progres')->default('Belum sah');
            $table->string('jenis_permohonan_kakitangan')->default('OT1');
            $table->string('jenis_permohonan');
            $table->unsignedInteger('id_peg_sokong')->default('0');
            $table->unsignedInteger('id_peg_pelulus')->default('0');
            $table->unsignedInteger('id_kerani_pemeriksa')->default('0');
            $table->unsignedInteger('id_kerani_semakan')->default('0');
            $table->integer('is_for_datuk_bandar');
            $table->unsignedInteger('peg_sokong_approved')->default('0');
            $table->unsignedInteger('status_akhir');
            $table->timestamps();
        }); 

        Schema::table('permohonan_barus', function($table) {
            $table->foreign('id_peg_sokong')->references('id')->on('users');
            $table->foreign('id_peg_pelulus')->references('id')->on('users');
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

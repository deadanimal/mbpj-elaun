<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEKedatangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_kedatangans', function (Blueprint $table) {
            $table->bigIncrements('id_ekedatangan');
            $table->unsignedInteger('CUSTOMERID');
            $table->string('tarikh');
            $table->string('waktu_masuk');
            $table->string('waktu_keluar');
            $table->string('jumlah_waktu_kerja');
            $table->string('waktu_masuk_OT_1');
            $table->string('waktu_keluar_OT_1');
            $table->string('jumlah_OT_1');
            $table->string('waktu_masuk_OT_2');
            $table->string('waktu_keluar_OT_2');
            $table->string('jumlah_OT_2');
            $table->string('waktu_masuk_OT_3');
            $table->string('waktu_keluar_OT_3');
            $table->string('jumlah_OT_3');
            $table->string('jumlah_OT_keseluruhan');
            $table->string('waktu_anjal');
            $table->timestamps();
        });

        Schema::table('e_kedatangans', function($table) {
            $table->foreign('CUSTOMERID')->references('CUSTOMERID')->on('users');
        });
    }  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_kedatangans');
    }
}

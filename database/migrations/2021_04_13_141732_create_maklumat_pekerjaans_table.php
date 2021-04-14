<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumatPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumat_pekerjaans', function (Blueprint $table) {
            // $table->increments('id_maklumat_pekerjaan');
            // $table->unsignedInteger('HR_NO_PEKERJA')->primary();
            $table->increments('HR_NO_PEKERJA');
            $table->unsignedInteger('HR_JABATAN')->nullable();
            $table->unsignedInteger('HR_BAHAGIAN');
            $table->string('HR_JAWATAN');
            $table->unsignedInteger('HR_GRED');
            $table->float('HR_GAJI_POKOK');
            $table->string('HR_MATRIKS_GAJI');
            $table->timestamps();
        });

        Schema::table('maklumat_pekerjaans', function($table) {
            $table->foreign('HR_NO_PEKERJA')->references('CUSTOMERID')->on('users');
            $table->foreign('HR_JABATAN')->references('GE_KOD_JABATAN')->on('jabatans');
            $table->foreign('HR_JAWATAN')->references('HR_KOD_JAWATAN')->on('jawatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maklumat_pekerjaans');
    }
}

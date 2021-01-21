<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableToMajlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majlis_ge_jabatan', function (Blueprint $table) {
            $table->string('ge_kod_jabatan', 2)->change();
            
        });

        Schema::table('majlis_ge_bahagian', function (Blueprint $table) {
            $table->string('ge_kod_jabatan',3)->after('ge_kod_bahagian');
            $table->foreign('ge_kod_jabatan')->references('ge_kod_jabatan')->on('majlis_ge_jabatan');
        });

        Schema::table('majlis_ge_unit', function (Blueprint $table) {
            $table->string('ge_kod_bahagian',3)->after('ge_kod_unit');
            $table->foreign('ge_kod_bahagian')->references('ge_kod_bahagian')->on('majlis_ge_bahagian');
            $table->string('ge_kod_jabatan',3)->after('ge_kod_bahagian');
            $table->foreign('ge_kod_jabatan')->references('ge_kod_jabatan')->on('majlis_ge_bahagian');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('majlis_ge_bahagian', function (Blueprint $table) {
            //
        });
    }
}

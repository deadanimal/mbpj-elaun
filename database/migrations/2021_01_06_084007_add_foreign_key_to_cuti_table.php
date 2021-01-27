<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('spp_hr_cuti', function (Blueprint $table) {
        //     $table->char('hr_kod_cuti_umum',5);
        //     $table->foreign('hr_kod_cuti_umum')->references('hr_kod_cuti_umum')->on('spp_hr_cuti_umum');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('spp_hr_cuti', function (Blueprint $table) {
        //     //
        // });
    }
}

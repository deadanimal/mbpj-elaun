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
            $table->id();
            $table->string('tarikh_permohonan');
            $table->string('masa_mula');
            $table->string('masa_akhir');
            $table->string('masa');
            $table->string('hari');
            $table->string('waktu');
            $table->string('kadar_jam');
            $table->string('tujuan');
            $table->timestamps();
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

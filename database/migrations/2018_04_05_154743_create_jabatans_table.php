<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // had to change the date of creation cause table users depends on the jabatan
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('GE_KOD_JABATAN');
            $table->string('GE_KETERANGAN_JABATAN');
            $table->string('GE_ALAMAT1');
            $table->string('GE_ALAMAT2');
            $table->string('GE_ALAMAT3');
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
        Schema::dropIfExists('jabatans');
    }
}

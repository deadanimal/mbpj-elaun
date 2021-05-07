<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawatans', function (Blueprint $table) {
            // $table->increments('id_jawatan');
            $table->string('HR_KOD_JAWATAN')->index();
            $table->text('HR_NAMA_JAWATAN');
            $table->string('HR_AKTIF_IND');
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
        Schema::dropIfExists('jawatans');
    }
}

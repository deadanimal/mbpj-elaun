<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanWithUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('permohonan_with_users', function (Blueprint $table) {
            $table->bigIncrements('id_permohonan_with_users');
            $table->unsignedBigInteger('id_permohonan_baru');
            $table->unsignedInteger('CUSTOMERID');
            $table->string('no_kumpulan')->default('');
            // $table->string('masa_mula_sebenar')->nullable();
            // $table->string('masa_mula_sebenar')->nullable();
            $table->string('masa_mula_sebenar')->default('-');
            $table->string('masa_akhir_sebenar')->default('-');
            $table->string('masa_sebenar')->nullable();
            $table->string('jumlah_tuntutan_elaun')->default('0.00');
            $table->integer('is_rejected_individually')->default('0');
            $table->timestamps();
        });

        Schema::table('permohonan_with_users', function($table) {
            $table->foreign('CUSTOMERID')->references('CUSTOMERID')->on('users');
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
        Schema::dropIfExists('permohonan_with_users');
    }
}

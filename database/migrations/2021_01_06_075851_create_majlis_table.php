<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majlis_ge_jabatan', function (Blueprint $table) {
            // $table->increments('id');
            // $table->primary('ge_kod_jabatan');
            $table->increments('ge_kod_jabatan');
            // $table->string('ge_kod_jabatan',2);
            $table->string('ge_keterangan_jabatan',50);
            $table->string('ge_alamat1',35);
            $table->string('ge_alamat2',35);
            $table->string('ge_alamat3',35);
            $table->string('ge_bandar',20);
            $table->string('ge_poskod',10);
            $table->string('ge_negeri',2);
            $table->string('ge_telpejabat1',20);
            $table->string('ge_telpejabat2',20);
            $table->string('ge_faks1',20);
            $table->string('ge_faks2',20);
            $table->string('ge_email',50);
            $table->string('ge_no_ketua',5);
            $table->string('ge_singkatan',10);
            $table->string('ge_aktif_ind',1);
        });

        Schema::create('majlis_ge_bahagian', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('ge_kod_bahagian');
            $table->string('ge_kod_bahagian',2);
            $table->string('ge_keterangan',60);
            $table->string('ge_alamat1',35);
            $table->string('ge_alamat2',35);
            $table->string('ge_alamat3',35);
            $table->string('ge_bandar',20);
            $table->string('ge_poskod',10);
            $table->string('ge_negeri',2);
            $table->string('ge_telpejabat1',20);
            $table->string('ge_telpejabat2',20);
            $table->string('ge_faks1',20);
            $table->string('ge_faks2',20);
            $table->string('ge_email',50);
            $table->string('ge_no_ketua',5);
            $table->string('ge_singkatan',10);
            $table->string('ge_aktif_ind',1);
        });

        Schema::create('majlis_ge_unit', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('ge_kod_unit');
            $table->string('ge_kod_unit',2);
            $table->string('ge_keterangan',50);
            $table->string('ge_alamat1',35);
            $table->string('ge_alamat2',35);
            $table->string('ge_alamat3',35);
            $table->string('ge_bandar',20);
            $table->string('ge_poskod',10);
            $table->string('ge_negeri',2);
            $table->string('ge_telpejabat1',20);
            $table->string('ge_telpejabat2',20);
            $table->string('ge_faks1',20);
            $table->string('ge_faks2',20);
            $table->string('ge_email',50);
            $table->string('ge_no_ketua',5);
            $table->string('ge_singkatan',10);
            $table->string('ge_aktif_ind',1);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majlis_ge_unit');
        Schema::dropIfExists('majlis_ge_bahagian');
        Schema::dropIfExists('majlis_ge_jabatan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('spp_hr_gelaran_jawatan', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_kod_gelaran');
            $table->char('hr_kod_gelaran',5);
            $table->string('hr_penerangan',100);
            $table->string('hr_singkatan',10);
            $table->char('hr_kod_jawatan',5);
            $table->char('hr_kod_gred',5);
        });

        Schema::create('spp_hr_jawatan', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_kod_jawatan');
            $table->char('hr_kod_jawatan',5);
            $table->string('hr_nama_jawatan');
            $table->char('hr_aktif_ind',1);
        });

        Schema::create('spp_hr_maklumat_peribadi', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_no_pekerja');
            $table->char('hr_no_pekerja',5);
            $table->char('hr_no_kpbaru',12);
            $table->string('hr_nama_pekerja',100);
            $table->string('hr_no_kplama',8);
            $table->date('hr_tarikh_lahir');
            $table->char('hr_tempat_lahir',2);
            $table->char('hr_warganegara',3);
            $table->char('hr_agama',1);
            $table->char('hr_keturunan',1);
            $table->char('hr_jantina',1);
            $table->char('hr_taraf_kahwin',1);
            $table->char('hr_lesen',1);
            $table->string('hr_kelas_lesen',20);
            $table->string('hr_talamat1',35);
            $table->string('hr_talamat2',35);
            $table->string('hr_talamat3',35);
            $table->string('hr_tbandar',20);
            $table->string('hr_tposkod',10);
            $table->char('hr_tnegeri',2);
            $table->string('hr_salamat1',35);
            $table->string('hr_salamat2',35);
            $table->string('hr_salamat3',35);
            $table->string('hr_sbandar',20);
            $table->char('hr_snegeri',2);
            $table->char('hr_tahun_spm',4);
            $table->char('hr_gred_bm',2);
            $table->string('hr_telrumah',20);
            $table->string('hr_telpejabat',20);
            $table->string('hr_telbimbit',20);
            $table->string('hr_email',50);
            $table->char('hr_aktif_ind',1);
            $table->date('hr_tarikh')->unique();
            $table->string('hr_catatan',200);
        });

        Schema::create('spp_hr_maklumat_pekerjaan', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_no_pekerja');
            $table->char('hr_no_pekerja',5);
            $table->char('hr_kod_jawatan',5);
            $table->char('hr_catatan',200);
        });

        Schema::create('spp_hr_elaun', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_kod_elaun');
            $table->char('hr_kod_elaun',5);
            $table->string('hr_penerangan_elaun',200);
            $table->string('hr_catatan',200);
        });

        Schema::create('spp_hr_cuti_umum', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_kod_cuti_umum');
            $table->char('hr_kod_cuti_umum',5);
            $table->date('hr_tarikh')->unique();
            $table->string('hr_catatan',200);
        });

        Schema::create('spp_hr_cuti', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary('hr_kod_cuti');
            $table->char('hr_kod_cuti',5);
            $table->string('hr_keterangan',50);
            $table->char('hr_singkatan',5);
            $table->integer('hr_jumlah_cuti')->length(3)->nullable();
            $table->char('hr_kategori',3)->nullable();
            $table->char('hr_cuti_ind',1);
            $table->integer('hr_kekerapan')->length(3)->nullable();
            $table->char('hr_aktif_ind',1);
            $table->string('hr_icon',50)->nullable();
            $table->string('hr_color',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spp_hr_cuti');
        Schema::dropIfExists('spp_hr_cuti_umum');
        
    }
}

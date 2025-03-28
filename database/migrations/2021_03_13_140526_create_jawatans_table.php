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
        // this is needed for DO DB
        // DB::statement('SET SESSION sql_require_primary_key=0');

        Schema::create('jawatans', function (Blueprint $table) {
            // For local
            $table->string('HR_KOD_JAWATAN')->index();

            // For DO 
            // $table->string('HR_KOD_JAWATAN')->primary();

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

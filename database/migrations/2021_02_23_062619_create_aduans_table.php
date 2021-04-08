<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->string('tajuk')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedInteger('USERID');
            $table->timestamps();
        });

        Schema::table('aduans', function($table) {
            $table->foreign('USERID')->references('USERID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aduans');
    }
}

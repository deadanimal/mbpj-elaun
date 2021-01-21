<?php

use Illuminate\Database\Seeder;

class PermohonanBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permohonan_barus')->insert([
            'id' => 1,
            'tarikh_permohonan' => '1/1/2021',
            'masa_mula' => 'This is the Pentadbir Sistem role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}

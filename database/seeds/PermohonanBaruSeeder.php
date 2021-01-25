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
            'id_permohonan_baru' => 1,
            'tarikh_permohonan' => '1/1/2021',
            'masa_mula' => '10:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT1', // OT for borang A, EL for borang B
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 2,
            'tarikh_permohonan' => '1/1/2021',
            'masa_mula' => '10:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'EL1', // OT for borang A, EL for borang B
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 3,
            'tarikh_permohonan' => '1/1/2021',
            'masa_mula' => '10:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT2', // OT for borang A, EL for borang B
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 4,
            'tarikh_permohonan' => '1/1/2021',
            'masa_mula' => '10:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'EL2', // OT for borang A, EL for borang B
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

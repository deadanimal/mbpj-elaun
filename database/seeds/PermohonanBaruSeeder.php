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
            'masa_mula' => '11:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT1', // OT for borang A, EL for borang B
            'id_penyelia' => '0',
            'id_ketua_bahagian' => '0',
            'id_ketua_jabatan' => '0',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 2,
            'tarikh_permohonan' => '2/1/2021',
            'masa_mula' => '12:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'EL1', // OT for borang A, EL for borang B
            'id_penyelia' => '2',
            'id_ketua_bahagian' => '4',
            'id_ketua_jabatan' => '5',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 3,
            'tarikh_permohonan' => '3/1/2021',
            'masa_mula' => '13:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT2', // OT for borang A, EL for borang B
            'id_penyelia' => '2',
            'id_ketua_bahagian' => '4',
            'id_ketua_jabatan' => '5',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 4,
            'tarikh_permohonan' => '4/1/2021',
            'masa_mula' => '14:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'EL2', // OT for borang A, EL for borang B
            'id_penyelia' => '2',
            'id_ketua_bahagian' => '4',
            'id_ketua_jabatan' => '5',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 5,
            'tarikh_permohonan' => '5/1/2021',
            'masa_mula' => '15:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT1', // OT for borang A, EL for borang B
            'id_penyelia' => '2',
            'id_ketua_bahagian' => '4',
            'id_ketua_jabatan' => '5',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_barus')->insert([
            'id_permohonan_baru' => 6,
            'tarikh_permohonan' => '6/1/2021',
            'masa_mula' => '16:00',
            'masa_akhir' => '10:00',
            'masa' => '10:00',
            'hari' => 'Rabu',
            'waktu' => 'Pagi',
            'kadar_jam' => '7',
            'tujuan' => 'Saja2', 
            'status' => 'OT1', // OT for borang A, EL for borang B
            'id_penyelia' => '2',
            'id_ketua_bahagian' => '4',
            'id_ketua_jabatan' => '5',
            'id_kerani_pemeriksa' => '6',
            'id_kerani_semakan' => '7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

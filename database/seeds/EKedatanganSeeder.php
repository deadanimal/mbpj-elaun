<?php

use Illuminate\Database\Seeder;

class EKedatanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 1,
            'id_user' => '4',
            'tarikh' => '1/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 2,
            'id_user' => '5',
            'tarikh' => '2/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 3,
            'id_user' => '6',
            'tarikh' => '3/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 4,
            'id_user' => '7',
            'tarikh' => '4/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 5,
            'id_user' => '8',
            'tarikh' => '5/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('e_kedatangans')->insert([
            'id_ekedatangan' => 6,
            'id_user' => '3',
            'tarikh' => '6/1/2021',
            'waktu_masuk' => '10:00',
            'waktu_keluar' => '18:00',
            'jumlah_waktu_kerja' => '13',
            'waktu_masuk_OT_1' => '16:00',
            'waktu_keluar_OT_1' => '18:00',
            'jumlah_OT_1' => '2',
            'waktu_masuk_OT_2' => '16:00',
            'waktu_keluar_OT_2' => '18:00',
            'jumlah_OT_2' => '2',
            'waktu_masuk_OT_3' => '16:00',
            'waktu_keluar_OT_3' => '18:00',
            'jumlah_OT_3' => '2',
            'jumlah_OT_keseluruhan' => '6', 
            'waktu_anjal' => 'NA', 
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

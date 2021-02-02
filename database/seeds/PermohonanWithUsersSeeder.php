<?php

use Illuminate\Database\Seeder;

class PermohonanWithUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 1,
            'id_permohonan_baru' => '1',
            'users_id' => '4',
            'jenis_permohonan' => 'OT1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 2,
            'id_permohonan_baru' => '2',
            'users_id' => '4',
            'jenis_permohonan' => 'EL1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 3,
            'id_permohonan_baru' => '3',
            'users_id' => '4,5',
            'jenis_permohonan' => 'OT2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 4,
            'id_permohonan_baru' => '4',
            'users_id' => '3,4,5,6,7,8',
            'jenis_permohonan' => 'EL2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 5,
            'id_permohonan_baru' => '5',
            'users_id' => '7',
            'jenis_permohonan' => 'OT1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permohonan_with_users')->insert([
            'id_permohonan_with_users' => 6,
            'id_permohonan_baru' => '6',
            'users_id' => '4',
            'jenis_permohonan' => 'OT1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

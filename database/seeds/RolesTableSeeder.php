<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Pentadbir Sistem',
            'description' => 'This is the Pentadbir Sistem role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Penyelia',
            'description' => 'This is the Penyelia role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Datuk Bandar',
            'description' => 'This is the Datuk Bandar role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Ketua Bahagian',
            'description' => 'This is the Ketua Bahagian role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'Ketua Jabatan',
            'description' => 'This is the Ketua Jabatan role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'Kerani Semakan',
            'description' => 'This is the Kerani Semakan role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 7,
            'name' => 'Kerani Pemeriksaan',
            'description' => 'This is the Kerani Pemeriksaan role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 8,
            'name' => 'Kakitangan',
            'description' => 'This is the Kakitangan role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 9,
            'name' => 'Pelulus Pindaan',
            'description' => 'This is the Pelulus Pindaan role',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

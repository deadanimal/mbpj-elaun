<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Pentadbir Sistem',
            'email' => 'admin@argon.com',
            'role_id' => 1,
            'ge_kod_jabatan' => '04',
            'gaji' => 1000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Penyelia',
            'email' => 'py@argon.com',
            'role_id' => 2,
            'ge_kod_jabatan' => '04',
            'gaji' => 2000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 9,
            'name' => 'Penyelia 2',
            'email' => 'py2@argon.com',
            'role_id' => 2,
            'ge_kod_jabatan' => '04',
            'gaji' => 3000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Datuk Bandar',
            'email' => 'db@argon.com',
            'role_id' => 3,
            'ge_kod_jabatan' => '05',
            'gaji' => 4000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Ketua Bahagian',
            'email' => 'kb@argon.com',
            'role_id' => 4,
            'ge_kod_jabatan' => '05',
            'gaji' => 5000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 10,
            'name' => 'Ketua Bahagian 2',
            'email' => 'kb2@argon.com',
            'role_id' => 4,
            'ge_kod_jabatan' => '05',
            'gaji' => 6000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Ketua Jabatan',
            'email' => 'kj@argon.com',
            'role_id' => 5,
            'ge_kod_jabatan' => '06',
            'gaji' => 7000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Kerani Semakan',
            'email' => 'ks@argon.com',
            'role_id' => 6,
            'ge_kod_jabatan' => '06',
            'gaji' => 8000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Kerani Pemeriksa',
            'email' => 'kp@argon.com',
            'role_id' => 7,
            'ge_kod_jabatan' => '06',
            'gaji' => 9000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 8,
            'name' => 'Kakitangan',
            'email' => 'kt@argon.com',
            'role_id' => 8,
            'ge_kod_jabatan' => '06',
            'gaji' => 10000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([
            'id' => 11,
            'name' => 'Pelulus Pindaan',
            'email' => 'pp@argon.com',
            'role_id' => 9,
            'ge_kod_jabatan' => '05',
            'gaji' => 11000.00,
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

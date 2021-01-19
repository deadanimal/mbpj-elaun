<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class)->create([
        //     'id' => 1,
        //     'name' => 'Pentadbir Sistem',
        //     'email' => 'admin@argon.com',
        //     'role_id' => 1,
        // ]);

    //     factory(App\User::class)->create([
    //         'id' => 2,
    //         'name' => 'Penyelia',
    //         'email' => 'py@argon.com',
    //         'role_id' => 2,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 3,
    //         'name' => 'Datuk Bandar',
    //         'email' => 'db@argon.com',
    //         'role_id' => 3,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 4,
    //         'name' => 'Ketua Bahagian',
    //         'email' => 'kb@argon.com',
    //         'role_id' => 4,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 5,
    //         'name' => 'Ketua Jabatan',
    //         'email' => 'kj@argon.com',
    //         'role_id' => 5,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 6,
    //         'name' => 'Kerani Semakan',
    //         'email' => 'ks@argon.com',
    //         'role_id' => 6,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 7,
    //         'name' => 'Kerani Pemeriksa',
    //         'email' => 'kp@argon.com',
    //         'role_id' => 7,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 8,
    //         'name' => 'Kakitangan',
    //         'email' => 'kt@argon.com',
    //         'role_id' => 8,
    //     ]);

    //     factory(App\User::class)->create([
    //         'id' => 9,
    //         'name' => 'Pelulus Pindaan',
    //         'email' => 'pp@argon.com',
    //         'role_id' => 9,
    //     ]);


    DB::table('users')->insert([
        'id' => 1,
        'name' => 'Pentadbir Sistem',
        'email' => 'admin@argon.com',
        'role_id' => 1,
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
        'password' => Hash::make('secret'), // secret
        'remember_token' => Str::random(10),
        'email_verified_at' => now(),
        'created_at' => now(),
        'updated_at' => now()
    ]);
    }
}

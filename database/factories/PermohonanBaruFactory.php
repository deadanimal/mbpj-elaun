<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\PermohonanBaru;
use Faker\Generator as Faker;

$factory->define(PermohonanBaru::class, function (Faker $faker) {
    return [
        'tarikh_mula_kerja' => $faker->date,
        'tarikh_akhir_kerja' => $faker->date,
        'masa_mula' => $faker->time($format = 'H:i', $max = 'now'),
        'masa_akhir' => $faker->time($format = 'H:i', $max = 'now'),
        'masa' => $faker->time($format = 'H:i', $max = 'now'),
        'hari' => $faker->dayOfWeek($max = 'now')  ,
        'waktu' => $faker->randomElement($array = array ('Pagi','Petang','Malam')),
        'kadar_jam' => 1.2,
        'tujuan' => $faker->sentence,
        'lokasi' => $faker->cityPrefix,
        'id_peg_sokong' => User::where('role_id', 2)
                                ->orWhere('role_id', 4)
                                ->get()
                                ->random()
                                ->CUSTOMERID,
        'id_peg_pelulus' => User::where('role_id', 4)
                                ->orWhere('role_id', 5)
                                ->get()
                                ->random()
                                ->CUSTOMERID,
        'jenis_permohonan' => $faker->randomElement($array = array ('OT1','OT2','EL1', 'EL2', 'PS1', 'PS2')),
        'status' => 'DALAM PROSES',
        'created_at' => now(),
        'updated_at' => now()
    ];
});

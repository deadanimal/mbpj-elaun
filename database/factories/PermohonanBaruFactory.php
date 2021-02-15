<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PermohonanBaru;
use Faker\Generator as Faker;

$factory->define(PermohonanBaru::class, function (Faker $faker) {
    return [

        'tarikh_permohonan' => $faker->date,
        'masa_mula' => $faker->time($format = 'H:i', $max = 'now'),
        'masa_akhir' => $faker->time($format = 'H:i', $max = 'now'),
        'masa' => $faker->time($format = 'H:i', $max = 'now'),
        'hari' => $faker->dayOfWeek($max = 'now')  ,
        'waktu' => $faker->randomElement($array = array ('Pagi','Petang','Malam')),
        'kadar_jam' => $faker->randomDigitNotNull,
        'tujuan' => $faker->sentence,
        'id_peg_sokong' => $faker->randomElement($array = array ('2','4')),
        'id_peg_pelulus' => $faker->randomElement($array = array ('10','5')),
        'jenis_permohonan' => $faker->randomElement($array = array ('OT1','OT2','EL1', 'EL2', 'PS1', 'PS2')),
        'status' => 'DALAM PROSES',
        'created_at' => now(),
        'updated_at' => now()
    ];
});

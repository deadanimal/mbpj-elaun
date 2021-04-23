<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\eKedatangan;
use Faker\Generator as Faker;
use App\permohonan_with_users;

$factory->define(eKedatangan::class, function (Faker $faker) {
    return [
        'CUSTOMERID' => permohonan_with_users::all()->random()->CUSTOMERID,
        'tarikh' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'waktu_masuk' => $faker->time($format = 'H:i',$max = 'now'),
        'waktu_keluar' => $faker->time($format = 'H:i', $max = 'now'),
        'jumlah_waktu_kerja' => $faker->randomDigitNotNull,
        'waktu_masuk_OT_1' => $faker->time($format = 'H:i', $max = 'now'),
        'waktu_keluar_OT_1' => $faker->time($format = 'H:i', $max = 'now'),
        'jumlah_OT_1' => $faker->randomDigitNotNull,
        'waktu_masuk_OT_2' => $faker->time($format = 'H:i', $max = 'now'),
        'waktu_keluar_OT_2' => $faker->time($format = 'H:i', $max = 'now'),
        'jumlah_OT_2' => $faker->randomDigitNotNull,
        'waktu_masuk_OT_3' => $faker->time($format = 'H:i', $max = 'now'),
        'waktu_keluar_OT_3' => $faker->time($format = 'H:i', $max = 'now'),
        'jumlah_OT_3' => $faker->randomDigitNotNull,
        'jumlah_OT_keseluruhan' => $faker->randomDigitNotNull,
        'waktu_anjal' => $faker->randomDigitNotNull,
        'created_at' => now(),
        'updated_at' => now()
    ];
});

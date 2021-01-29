<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanBaru extends Model
{
    protected $table = 'permohonan_barus';
    protected $primaryKey = 'id_permohonan_baru';
    protected $fillable = [
        'tarikh_permohonan',
        'masa_mula',
        'masa_akhir',
        'masa',
        'hari',
        'waktu',
        'kadar_jam',
        'tujuan'];

    // Default value
    protected $attributes = [
        'id_penyelia' => 0,
        'id_ketua_bahagian' => 0,
        'id_ketua_jabatan' => 0,
        'id_kerani_semakan' => 0,
        'id_kerani_pemeriksa' => 0
    ];
}

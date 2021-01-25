<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanBaru extends Model
{
    protected $table = 'permohonan_barus';
    protected $fillable = [
        'tarikh_permohonan',
        'masa_mula',
        'masa_akhir',
        'masa',
        'hari',
        'waktu',
        'kadar_jam',
        'tujuan'];
}

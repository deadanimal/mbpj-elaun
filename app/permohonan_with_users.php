<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class permohonan_with_users extends Model
{
    protected $table = 'permohonan_with_users';
    protected $fillable = [
        'is_rejected_individually',
        'masa_mula_sebenar',
        'masa_akhir_sebenar',
        'masa_sebenar_siang',
        'masa_sebenar_malam',
        'jumlah_tuntutan_elaun'
    ];
    protected $attributes = [
        'is_rejected_individually' => 0,
    ];
}

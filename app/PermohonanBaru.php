<?php

namespace App;

use App\User;
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
        'tujuan',
        'catatan'
    ];

    // Default value
    protected $attributes = [
        'id_peg_sokong' => 0,
        'id_peg_pelulus' => 0,
        'catatan' => '-',
        'jenis_permohonan' => 'DALAM PROSES'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'permohonan_with_users', 'id_permohonan_baru', 'id')
                    ->as('permohonan_with_users');
    }
}

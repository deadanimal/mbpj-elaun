<?php

namespace App;

use App\User;
use App\PermohonanBaru;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'catatans';
    protected $primaryKey = 'id_catatan';
    protected $fillable = [
        'catatan',
        'is_kemaskini',
        'jenis_permohonan',
        'masa',
        'CUSTOMERID'
    ];

    protected $attribute = [
        'jenis_permohonan' => 'OT'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'CUSTOMERID', 'CUSTOMERID');
    }

    public function permohonan()
    {
        return $this->belongsTo(PermohonanBaru::class, 'id_permohonan_baru', 'id_permohonan_baru');
    }
}

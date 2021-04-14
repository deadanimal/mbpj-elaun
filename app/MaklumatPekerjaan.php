<?php

namespace App;

use App\User;
use App\Jawatan;
use Illuminate\Database\Eloquent\Model;

class MaklumatPekerjaan extends Model
{
    protected $table = 'maklumat_pekerjaans';
    // protected $primaryKey = 'id_maklumat_pekerjaan';
    protected $primaryKey = 'HR_NO_PEKERJA';
    protected $fillable = [
        'HR_NO_PEKERJA', 
        'HR_JABATAN',
        'HR_BAHAGIAN', 
        'HR_JAWATAN', 
        'HR_GRED',
        'HR_GAJI_POKOK',
        'HR_MATRIKS_GAJI'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'CUSTOMERID', 'HR_NO_PEKERJA');
    // }

    public function user()
    {
        return $this->hasOne(User::class, 'CUSTOMERID', 'HR_NO_PEKERJA');
    }

    public function jawatan()
    {
        return $this->belongsTo(Jawatan::class, 'HR_KOD_JAWATAN', 'HR_JAWATAN');
    }
}

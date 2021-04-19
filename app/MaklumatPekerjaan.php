<?php

namespace App;

use App\User;
use App\Jawatan;
use Illuminate\Database\Eloquent\Model;
use App\Jabatan;

class MaklumatPekerjaan extends Model
{
    protected $table = 'maklumat_pekerjaans';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'HR_NO_PEKERJA', 'CUSTOMERID');
    }

    public function jawatan()
    {
        return $this->belongsTo(Jawatan::class, 'HR_KOD_JAWATAN', 'HR_JAWATAN');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'HR_JABATAN', 'GE_KOD_JABATAN');
    }
}

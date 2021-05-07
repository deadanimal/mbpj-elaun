<?php

namespace App;

use App\MaklumatPekerjaan;
use Illuminate\Database\Eloquent\Model;

class Jawatan extends Model
{
    protected $table = 'jawatans';
    protected $primaryKey = 'HR_KOD_JAWATAN';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'HR_NAMA_JAWATAN',
        'HR_AKTIF_IND'
    ];

    public function maklumatpekerjaan()
    {
        return $this->hasMany(MaklumatPekerjaan::class, 'HR_JAWATAN', 'HR_KOD_JAWATAN');
    }
}

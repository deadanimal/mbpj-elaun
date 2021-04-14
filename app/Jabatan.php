<?php

namespace App;

use App\User;
use App\MaklumatPekerjaan;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $primaryKey = 'GE_KOD_JABATAN';
    public $incrementing = false;

    public function users()
    {
        return $this->hasMany(User::class, 'CUSTOMERID', 'CUSTOMERID');
    }

    public function maklumatUsers()
    {
        return $this->hasMany(MaklumatPekerjaan::class, 'HR_JABATAN', 'GE_KOD_JABATAN');
    }
}

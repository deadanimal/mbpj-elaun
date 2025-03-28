<?php

namespace App;

use App\Aduan;
use App\Catatan;
use App\Jawatan;
use App\eKedatangan;
use App\PermohonanBaru;
use App\MaklumatPekerjaan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'CUSTOMERID';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USERID',
        'USERNAME', 
        'DEPARTMENTCODE', 
        'NIRC', 
        'NAME',
        'MOBILE_PHONE',
        'email',
        'role_id',
        'is_oncall',
        'is_active',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profilePicture()
    {
        if ($this->picture) {
            return "/storage/{$this->picture}";
        }

        return 'http://i.pravatar.cc/200';
    }

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function isCreator()
    {
        return $this->role_id == 2;
    }

    public function isMember()
    {
        return $this->role_id == 3;
    }

    public function isKetuaBahagian()
    {
        return $this->role_id == 4;
    }

    public function isKetuaJabatan()
    {
        return $this->role_id == 5;
    }

    public function isKeraniSemakan()
    {
        return $this->role_id == 6;
    }

    public function isKeraniPemeriksa()
    {
        return $this->role_id == 7;
    }

    public function isKakitangan()
    {
        return $this->role_id == 8;
    }

    public function isPelulusPindaanSah()
    {
        return $this->role_id == 9;
    }

    public function isPelulusPindaanLulus()
    {
        return $this->role_id == 10;
    }

    public function permohonans()
    {
        return $this->belongsToMany(PermohonanBaru::class, 'permohonan_with_users', 'CUSTOMERID', 'id_permohonan_baru')
                    ->withPivot(
                        'masa_mula_sebenar',
                        'masa_akhir_sebenar',
                        'is_rejected_individually',
                        'masa_sebenar',
                        'no_kumpulan',
                        'jumlah_tuntutan_elaun'
                        )
                    ->withTimestamps()
                    ->as('permohonan_with_users');
    }

    public function ekedatangan()
    {
        return $this->hasOne(eKedatangan::class, 'CUSTOMERID', 'CUSTOMERID');
    }

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'CUSTOMERID', 'CUSTOMERID');
    }

    public function aduans()
    {
        return $this->hasMany(Aduan::class, 'CUSTOMERID', 'CUSTOMERID');
    }

    public function maklumat_pekerjaan()
    {
        return $this->hasOne(MaklumatPekerjaan::class, 'HR_NO_PEKERJA', 'CUSTOMERID');
    }
}

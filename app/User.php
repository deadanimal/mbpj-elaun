<?php

namespace App;

use App\Aduan;
use App\Catatan;
use App\Jabatan;
use App\eKedatangan;
use App\PermohonanBaru;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'USERID';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USERNAME', 
        'DEPARTMENTCODE', 
        'NIRC', 
        'NAME',
        'MOBILE_PHONE',
        'GAJI',
        'email',
        'role_id',
        'GE_KOD_JABATAN',
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

    /**
     * Get the role of the user
     *
     * @return \App\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture()
    {
        if ($this->picture) {
            return "/storage/{$this->picture}";
        }

        return 'http://i.pravatar.cc/200';
    }

    /**
     * Check if the user has admin role
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    /**
     * Check if the user has creator role
     *
     * @return boolean
     */
    public function isCreator()
    {
        return $this->role_id == 2;
    }

    /**
     * Check if the user has user role
     *
     * @return boolean
     */
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

    public function isPelulusPindaan()
    {
        return $this->role_id == 9;
    }

    public function permohonans()
    {
        return $this->belongsToMany(PermohonanBaru::class, 'permohonan_with_users', 'USERID', 'id_permohonan_baru')
                    ->withPivot(
                        'masa_mula_sebenar',
                        'masa_akhir_sebenar',
                        'is_rejected_individually',
                        'masa_sebenar_siang',
                        'masa_sebenar_malam',
                        'no_kumpulan',
                        'jumlah_tuntutan_elaun'
                        )
                    ->withTimestamps()
                    ->as('permohonan_with_users');
    }

    public function ekedatangan()
    {
        return $this->hasOne(eKedatangan::class, 'USERID', 'USERID');
    }

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'USERID', 'USERID');
    }

    public function aduans()
    {
        return $this->hasMany(Aduan::class, 'USERID', 'USERID');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'GE_KOD_JABATAN', 'GE_KOD_JABATAN');
    }
}

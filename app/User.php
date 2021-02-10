<?php

namespace App;

use App\Catatan;
use App\eKedatangan;
use App\PermohonanBaru;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'picture' ,'role_id'
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
        return $this->belongsToMany(PermohonanBaru::class, 'permohonan_with_users', 'id', 'id_permohonan_baru');
    }

    public function permohonanss()
    {
        return $this->hasMany(PermohonanBaru::class);
    }

    public function ekedatangan()
    {
        return $this->hasOne(eKedatangan::class, 'id_user', 'id');
    }

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_user', 'id');
    }
}

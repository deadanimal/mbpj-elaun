<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'id_peg_sokong',
        'id_peg_pelulus',
        'id_kerani_pemeriksa',
        'id_kerani_semakan',
        'tujuan',
        'peg_sokong_approved',
        'jenis_permohonan_kakitangan',
        'status_akhir',
        'jenis_permohonan',
        'tarikh_akhir_kerja'
    ];

    // Default value
    protected $attributes = [
        'id_peg_sokong' => 0,
        'id_peg_pelulus' => 0,
        'id_kerani_semakan' => 6,
        'id_kerani_pemeriksa' => 7,
        'status' => 'DALAM PROSES',
        'jenis_permohonan_kakitangan' => '',
        'jenis_permohonan' => '',
        'status_akhir' => 2,
        'tarikh_akhir_kerja' => '2021-01-01'
    ];

    public function scopePermohonanPegawaiSokong($query)
    {
        return $query->where(function (Builder $q) {
                        return $q->where('id_peg_sokong', Auth::id())
                                 ->isNotApproved()
                                 ->isNotDitolakOrPerluKemaskini()
                                 ->notSahP2()
                                 ->isNotDeleted();
        });
    } 

    public function scopePermohonanPegawaiPelulus($query)
    {
        return $query->where(function (Builder $q) {
                            return $q->where('id_peg_pelulus', Auth::id())
                                     ->isApproved()
                                     ->isNotDitolakOrPerluKemaskini()
                                     ->notSahP2()
                                     ->isNotDeleted();
        });
    }

    public function scopePermohonanPegawaiSokongAtauPelulus($query)
    {
        return $query->permohonanPegawaiSokong()
                     ->orWhere(function (Builder $q) {
                            return $q->permohonanPegawaiPelulus();
                    })->notSahP2();
    }

    public function scopeIsNotDeleted($query)
    {
        return $query->where('is_deleted', 0);
    }

    public function scopeIsNotApproved($query)
    {
        return $query->where('peg_sokong_approved', 0);
    }

    public function scopeIsApproved($query)
    {
        return $query->where('peg_sokong_approved', 1);
    }

    public function scopeIsNotDitolakOrPerluKemaskini($query)
    {
        return $query->whereNotIn('status', ['DITOLAK', 'PERLU KEMASKINI']);
    }

    public function scopeNotSahP2($query)
    {
        return $query->where('progres', '!=', 'Sah P2');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permohonan_with_users', 'id_permohonan_baru', 'id')
                    ->withPivot('is_rejected_individually')
                    ->as('permohonan_with_users');
    }

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_permohonan_baru', 'id_permohonan_baru');
    }
}

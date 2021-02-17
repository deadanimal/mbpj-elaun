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
        'tujuan',
        'peg_sokong_approved'
    ];

    // Default value
    protected $attributes = [
        'id_peg_sokong' => 0,
        'id_peg_pelulus' => 0,
        'jenis_permohonan_kakitangan' => '',
        'jenis_permohonan' => 'OT1'
    ];

    public function scopePermohonanPegawaiSokong($query)
    {
        return $query->where(function (Builder $q) {
                        return $q->where('id_peg_sokong', Auth::id())
                                 ->isNotApproved()
                                 ->isNotDeleted();
        });
    } 

    public function scopePermohonanPegawaiPelulus($query)
    {
        return $query->where(function (Builder $q) {
                            return $q->where('id_peg_pelulus', Auth::id())
                                     ->isApproved()
                                     ->isNotDeleted();
});
    }

    public function scopePermohonanPegawaiSokongAtauPelulus($query)
    {
        return $query->permohonanPegawaiSokong()
                     ->orWhere(function (Builder $q) {
                            return $q->permohonanPegawaiPelulus();
                        });
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'permohonan_with_users', 'id_permohonan_baru', 'id')
                    ->as('permohonan_with_users');
    }

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_permohonan_baru', 'id_permohonan_baru');
    }
}

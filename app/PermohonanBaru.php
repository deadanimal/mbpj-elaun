<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

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
        return $query->where('id_peg_sokong', Auth::id());
    }

    public function scopePermohonanPegawaiPelulus($query)
    {
        return $query->pegawaiSokongApproved();
    }

    public function scopePermohonanPegawaiSokongAtauPelulus($query)
    {
        return $query->pegawaiSokongApproved()
                     ->orWhere('id_peg_sokong', Auth::id());
    }

    public function scopePegawaiSokongApproved($query)
    {
        return $query->where('peg_sokong_approved', 1)
                     ->where('id_peg_pelulus', Auth::id());
    }

    public function scopeIsNotDeleted($query)
    {
        return $query->where('is_deleted', 0);
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

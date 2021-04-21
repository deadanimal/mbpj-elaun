<?php

namespace App;

use App\User;
use App\Jabatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PermohonanBaru extends Model
{
    protected $table = 'permohonan_barus';
    protected $primaryKey = 'id_permohonan_baru';
    protected $fillable = [
        'tarikh_mula_kerja',
        'tarikh_akhir_kerja',
        'tarikh_pengesahan',
        'masa_mula',
        'masa_akhir',
        'masa_mula_sebenar',
        'masa_akhir_sebenar',
        'masa',
        'hari',
        'waktu',
        'kadar_jam',
        'jenis_hari',
        'id_peg_sokong',
        'id_peg_pelulus',
        'tujuan',
        'lokasi',
        'peg_sokong_approved',
        'kerani_pemeriksa_approved',
        'jenis_permohonan_kakitangan',
        'status_akhir',
        'jenis_permohonan',
        'tarikh_akhir_kerja',
        'is_for_datuk_bandar'
    ];

    // Default value
    protected $attributes = [
        'id_peg_sokong' => 0,
        'id_peg_pelulus' => 0,
        'status' => 'DALAM PROSES',
        'jenis_permohonan_kakitangan' => '',
        'jenis_permohonan' => '',
        'status_akhir' => 2,
        'tarikh_mula_kerja' => '',
        'tarikh_akhir_kerja' => '',
        'tarikh_pengesahan' => '',
        'is_for_datuk_bandar' => 0
    ];

    public function scopePermohonanPegawaiSokong($query)
    {
        return $query->where(function (Builder $q) {
                        return $q->where('id_peg_sokong', Auth::id())
                                 ->isNotApproved()
                                 ->isNotDitolakOrPerluKemaskini()
                                 ->notSahP2()
                                 ->statusAkhirBelomDiterima();
        });
    } 

    public function scopePermohonanPegawaiPelulus($query)
    {
        return $query->where(function (Builder $q) {
                            return $q->where('id_peg_pelulus', Auth::id())
                                     ->isApproved()
                                     ->isNotDitolakOrPerluKemaskini()
                                     ->notSahP2()
                                     ->notForDatukBandar()
                                     ->statusAkhirBelomDiterima();
                        });
    }

    public function scopePermohonanPegawaiSokongAtauPelulus($query)
    {
        return $query->permohonanPegawaiSokong()
                     ->orWhere(function (Builder $q) {
                            return $q->permohonanPegawaiPelulus(); })
                     ->notSahP2()
                     ->notForDatukBandar();
    }

    public function scopeStatusAkhirBelomDiterima($query)
    {
        return $query->where('status_akhir', 2);
    }

    public function scopeNotForDatukBandar($query)
    {
        return $query->where('is_for_datuk_bandar', 0);
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

    public function scopePegawaiSokong($query)
    {
        return $query->where('id_peg_sokong', Auth::id());
    }

    public function scopePegawaiPelulus($query)
    {
        return $query->where('id_peg_pelulus', Auth::id());
    }

    public function scopePegawaiSokongAtauPelulus($query)
    {
        return $query->pegawaiSokong()
                    ->orWhere(function (Builder $q) {
                        return $q->pegawaiPelulus(); });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permohonan_with_users', 'id_permohonan_baru', 'CUSTOMERID')
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

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_permohonan_baru', 'id_permohonan_baru');
    }
}

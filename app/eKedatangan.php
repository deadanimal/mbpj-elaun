<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class eKedatangan extends Model
{
    protected $table = 'e_kedatangans';
    protected $primaryKey = 'id_ekedatangan';
    protected $fillable = [
        'id_user',
        'tarikh',
        'waktu_masuk',
        'waktu_keluar',
        'jumlah_waktu_kerja',
        'waktu_masuk_OT_1',
        'waktu_keluar_OT_1',
        'jumlah_OT_1',
        'waktu_masuk_OT_2',
        'waktu_keluar_OT_2',
        'jumlah_OT_2',
        'waktu_masuk_OT_3',
        'waktu_keluar_OT_3',
        'jumlah_OT_3',
        'jumlah_OT_keseluruhan',
        'waktu_anjal'
    ];




    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
}

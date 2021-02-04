<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permohonan_with_users extends Model
{
    protected $table = 'permohonan_with_users';
    protected $primaryKey = 'id_permohonan_with_users';

    public function scopeFindPermohonanWithID($query, $jenisPermohonan, $id)
    {
        return $query->where('jenis_permohonan', $jenisPermohonan)
                        ->having('users_id','=', $id)
                        ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                        ->get();
    }

    public function scopeFindPermohonanWithNoID($query, $jenisPermohonan)
    {
        return $query->where('jenis_permohonan', $jenisPermohonan)
                        ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                        ->get();
    }

    public function scopeFindPermohonanWithAuthID($query, $jenisPermohonan, $authID)
    {
        return $query->where('jenis_permohonan', $jenisPermohonan)
                        ->having('users_id','=', $authID)
                        ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                        ->get();
    }

}

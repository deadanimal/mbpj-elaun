<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class GE_Jabatan extends Model
{
    protected $table = 'GE_JABATAN';
    protected $primaryKey = 'GE_KOD_JABATAN';

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }
}

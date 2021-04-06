<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $primaryKey = 'GE_KOD_JABATAN';
    public $incrementing = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }
}

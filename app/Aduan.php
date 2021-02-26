<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduans';
    protected $primaryKey = 'id_aduan';
    protected $fillable = [
        'tajuk',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }


}

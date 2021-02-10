<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'catatans';
    protected $primaryKey = 'id_catatan';
    protected $fillable = [
        'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

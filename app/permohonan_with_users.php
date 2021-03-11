<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class permohonan_with_users extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('reject', function (Builder $builder) {
            $builder->where('is_rejected_individually', 1);
        });
    }
    protected $table = 'permohonan_with_users';
    protected $fillable = [
        'is_rejected_individually',
        'masa_mula_sebenar',
        'masa_akhir_sebenar',
    ];
    protected $attributes = [
        'is_rejected_individually' => 0,
    ];
}

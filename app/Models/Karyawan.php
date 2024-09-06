<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_id',
        'tanggal_lahir',
        'status',
        'jenis_kelamin',
        'telepon',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->no_id = 'DCPSMG-' . strtoupper(Str::random(4));
        });
    }
}

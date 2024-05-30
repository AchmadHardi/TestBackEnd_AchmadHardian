<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_level',
    ];

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class);
    }
}

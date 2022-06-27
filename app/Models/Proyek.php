<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyeks';
    protected $guarded = ['id'];

    public function buku_kas()
    {
        return $this->hasMany(BukuKas::class);
    }
}

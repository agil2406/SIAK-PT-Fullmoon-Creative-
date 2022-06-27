<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $table = 'masters';
    protected $guarded = ['id'];

    public function buku_kas()
    {
        return $this->hasMany(BukuKas::class);
    }
}

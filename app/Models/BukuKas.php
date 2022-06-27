<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKas extends Model
{
    protected $table = 'buku_kas';
    protected $guarded = ['id'];

    public function master()
    {
        return $this->belongsTo(Master::class);
    }
    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}

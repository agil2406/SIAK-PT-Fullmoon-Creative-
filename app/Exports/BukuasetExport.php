<?php

namespace App\Exports;

use App\Models\BukuKas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuasetExport implements FromView
{
    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }
    public function view(): View
    {
        $total_aset = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->where('masters.jenisKas', 'bukuaset')->sum('pengeluaran');
        $tanggal = $this->dari;
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])
            ->where('masters.jenisKas', 'bukuaset')->get();
        return view('exports.bukuaset', compact('data', 'tanggal', 'total_aset'));
    }
}

<?php

namespace App\Exports;

use App\Models\BukuKas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukumaterialExport implements FromView
{
    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }
    public function view(): View
    {
        $total_material = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->where('masters.jenisKas', 'bukumaterial')->sum('pengeluaran');
        $tanggal = $this->dari;
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])
            ->where('masters.jenisKas', 'bukumaterial')->get();
        return view('exports.bukumaterial', compact('data', 'tanggal', 'total_material'));
    }
}

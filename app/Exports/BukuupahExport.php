<?php

namespace App\Exports;

use App\Models\BukuKas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuupahExport implements FromView
{
    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }
    public function view(): View
    {
        $total_upah = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->where('masters.jenisKas', 'bukuupah')->sum('pengeluaran');
        $tanggal = $this->dari;
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])
            ->where('masters.jenisKas', 'bukuupah')->get();
        return view('exports.bukuupah', compact('data', 'tanggal', 'total_upah'));
    }
}

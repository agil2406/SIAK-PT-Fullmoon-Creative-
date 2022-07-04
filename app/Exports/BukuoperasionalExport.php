<?php

namespace App\Exports;

use App\Models\BukuKas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuoperasionalExport implements FromView
{
    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }
    public function view(): View
    {
        $total_operasional = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->where('masters.jenisKas', 'bukuoperasional')->sum('pengeluaran');
        $tanggal = $this->dari;
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])
            ->where('masters.jenisKas', 'bukuoperasional')->get();
        return view('exports.bukuoperasional', compact('data', 'tanggal', 'total_operasional'));
    }
}

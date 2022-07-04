<?php

namespace App\Exports;

use App\Models\BukuKas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class BukukasExport implements FromView, WithColumnWidths
{
    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 10,
            'C' => 23,
            'D' => 8,
            'E' => 9,
            'F' => 14,
            'G' => 14,
            'H' => 14,
        ];
    }
    public function view(): View
    {
        $total_pengeluaran = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->sum('pengeluaran');
        $total_penerimaan = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->sum('penerimaan');
        $tanggal = $this->dari;
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])->orderBy('tanggal', 'asc')->get();
        return view('exports.bukukas', compact('data', 'tanggal', 'total_pengeluaran', 'total_penerimaan'));
    }
}

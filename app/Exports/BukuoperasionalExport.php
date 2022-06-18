<?php

namespace App\Exports;

use App\Models\BukuOperasional;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuoperasionalExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukuaset')
            ->select('uraian', 'tanggal', 'volume', 'satuan', 'penerimaan', 'pengeluaran')
            ->get();
        return $data;
    }
    public function headings(): array
    {


        return ["Uraian", "Tanggal", "Volume", "Satuan", "Penerimaan", "Pengeluaran"];
    }
}

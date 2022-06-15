<?php

namespace App\Exports;

use App\Models\BukuMaterial;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukumaterialExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukumaterial')
            ->select('uraian_bk', 'tanggal_bk', 'volume_bk', 'satuan_bk', 'penerimaan_bk', 'pengeluaran_bk')
            ->get();
        return $data;
    }
    public function headings(): array
    {


        return ["Uraian", "Tanggal", "Volume", "Satuan", "Penerimaan", "Pengeluaran"];
    }
}

<?php

namespace App\Exports;

use App\Models\BukuKas;
use App\Models\BukuOperasional;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuoperasionalExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }

    public function query()
    {
        $data = BukuKas::whereBetween('tanggal', [$this->dari, $this->sampai])
            ->where('jenisKas', 'bukuoperasional')
            ->select('uraian', 'tanggal', 'volume', 'satuan', 'penerimaan', 'pengeluaran');

        return $data;
    }
    public function headings(): array
    {


        return ["Uraian", "Tanggal", "Volume", "Satuan", "Penerimaan", "Pengeluaran"];
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\BukuoperasionalExport;
use App\Models\BukuKas;
use App\Models\BukuOperasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuOperasionalController extends Controller
{
    public function index()
    {
        return view('pages.bukuoperasional.cari-operasional');
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::whereBetween('tanggal', [$dari, $sampai])->where('jenisKas', 'bukuoperasional')->get();
        $total = BukuKas::whereBetween('tanggal', [$dari, $sampai])->where('jenisKas', 'bukuoperasional')->sum('pengeluaran');
        return view('pages.bukuoperasional.bukuOperasional', compact('data', 'total', 'dari', 'sampai'));
    }
    public function export($dari, $sampai)
    {
        return Excel::download(new BukuoperasionalExport($dari, $sampai), 'bukuoperasional.xlsx');
    }
}

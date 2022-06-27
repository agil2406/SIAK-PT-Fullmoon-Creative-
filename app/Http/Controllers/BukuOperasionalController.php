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
        $data = DB::table('buku_kas')->join('masters', 'buku_kas.master_id', '=', 'masters.id')->where('masters.jenisKas', 'bukuoperasional')->get();
        return view('pages.bukuoperasional.Operasional', compact('data'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuoperasional')->get();
        $total = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuoperasional')->sum('pengeluaran');
        return view('pages.bukuoperasional.bukuOperasional', compact('data', 'total', 'dari', 'sampai'));
    }
    public function export($dari, $sampai)
    {
        return Excel::download(new BukuoperasionalExport($dari, $sampai), 'bukuoperasional.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\BukuupahExport;
use App\Models\BukuKas;
use App\Models\BukuUpah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuUpahController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')->join('masters', 'buku_kas.master_id', '=', 'masters.id')->where('masters.jenisKas', 'bukuupah')->get();
        return view('pages.bukuupah.Upah', compact('data'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuupah')->get();
        $total = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuupah')->sum('pengeluaran');
        return view('pages.bukuupah.bukuUpah', compact('data', 'total', 'dari', 'sampai'));
    }
    public function export($dari, $sampai)
    {
        return Excel::download(new BukuupahExport($dari, $sampai), 'bukuupah.xlsx');
    }
}

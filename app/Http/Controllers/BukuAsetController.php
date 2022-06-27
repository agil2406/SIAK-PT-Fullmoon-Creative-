<?php

namespace App\Http\Controllers;

use App\Exports\BukuasetExport;
use App\Models\BukuKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuAsetController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')->join('masters', 'buku_kas.master_id', '=', 'masters.id')->where('masters.jenisKas', 'bukuaset')->get();
        return view('pages.bukuaset.Aset', compact('data'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuaset')->get();
        $total = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuaset')->sum('pengeluaran');
        return view('pages.bukuaset.bukuAset', compact('data', 'total', 'dari', 'sampai'));
    }
    public function export($dari, $sampai)
    {
        return Excel::download(new BukuasetExport($dari, $sampai), 'bukuaset.xlsx');
    }
}

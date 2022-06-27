<?php

namespace App\Http\Controllers;

use App\Exports\BukumaterialExport;
use App\Models\BukuKas;
use App\Models\BukuMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class BukuMaterialController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')->join('masters', 'buku_kas.master_id', '=', 'masters.id')->where('masters.jenisKas', 'bukumaterial')->get();
        return view('pages.bukumaterial.Material', compact('data'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukumaterial')->get();
        $total = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukumaterial')->sum('pengeluaran');
        return view('pages.bukumaterial.bukuMaterial', compact('data', 'total', 'dari', 'sampai'));
    }
    public function export($dari, $sampai)
    {
        return Excel::download(new BukumaterialExport($dari, $sampai), 'bukumaterial.xlsx');
    }
}

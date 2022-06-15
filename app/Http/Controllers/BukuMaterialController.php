<?php

namespace App\Http\Controllers;

use App\Exports\BukumaterialExport;
use App\Models\BukuMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class BukuMaterialController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukumaterial')
            ->get();
        return view('pages.bukumaterial.bukuMaterial', compact('data'));
    }
    public function export()
    {
        return Excel::download(new BukumaterialExport, 'bukumaterial.xlsx');
    }
}

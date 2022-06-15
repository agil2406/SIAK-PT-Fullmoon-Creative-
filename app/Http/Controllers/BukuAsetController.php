<?php

namespace App\Http\Controllers;

use App\Exports\BukuasetExport;
use App\Models\BukuAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuAsetController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukuaset')
            ->get();
        return view('pages.bukuaset.bukuAset', compact('data'));
    }
    public function export()
    {
        return Excel::download(new BukuasetExport, 'bukuaset.xlsx');
    }
}

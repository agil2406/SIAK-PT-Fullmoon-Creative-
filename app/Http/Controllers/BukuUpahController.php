<?php

namespace App\Http\Controllers;

use App\Exports\BukuupahExport;
use App\Models\BukuUpah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuUpahController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukuupah')
            ->get();
        return view('pages.bukuupah.bukuUpah', compact('data'));
    }
    public function export()
    {
        return Excel::download(new BukuupahExport, 'bukuupah.xlsx');
    }
}

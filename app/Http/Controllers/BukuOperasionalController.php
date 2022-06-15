<?php

namespace App\Http\Controllers;

use App\Exports\BukuoperasionalExport;
use App\Models\BukuOperasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class BukuOperasionalController extends Controller
{
    public function index()
    {
        $data = DB::table('buku_kas')
            ->where('jenisKas', 'bukuoperasional')
            ->get();
        return view('pages.bukuoperasional.bukuOperasional', compact('data'));
    }
    public function export()
    {
        return Excel::download(new BukuoperasionalExport, 'bukuoperasional.xlsx');
    }
}

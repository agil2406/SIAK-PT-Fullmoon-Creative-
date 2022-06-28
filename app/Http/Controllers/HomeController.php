<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\Proyek;
use App\Models\Rekap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }
    public function dashboard()
    {
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $a = date('Y-m-d', strtotime('-7 days'));
        $pengeluaran_hari = DB::table('buku_kas')->whereDate('tanggal', $day)->get();
        $pengeluaran_bulan = DB::table('buku_kas')->whereMonth('tanggal', $month)->whereYear('tanggal', $year)->sum('pengeluaran');
        $pengeluaran_minggu = DB::table('buku_kas')->whereBetween('tanggal', [$a, date('Y-m-d')])->sum('pengeluaran');
        $hari = date('Y-m-d');
        $proyek = Proyek::where('tgl_akhirproyek', '>', $hari)->get();
        $proyeks = Proyek::where('tgl_akhirproyek', '>', $hari)->limit(5)->get();
        $pengajuan = Rekap::where('status', '1')->limit(5)->get();

        return view('pages.direksi', compact('proyek', 'proyeks', 'pengeluaran_bulan', 'pengeluaran_minggu', 'hari', 'pengajuan'));
    }
}

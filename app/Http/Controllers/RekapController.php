<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\Rekap;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        return view('pages.rekap.cari-rekap');
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));


        $total_aset = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuaset')->sum('pengeluaran');
        $total_material = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukumaterial')->sum('pengeluaran');
        $total_operasional = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuoperasional')->sum('pengeluaran');
        $total_upah = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuupah')->sum('pengeluaran');
        return view('pages.rekap.tambahRekap', compact('total_aset', 'total_material', 'total_upah', 'total_operasional', 'dari', 'sampai'));
    }

    public function save(Request $request)
    {

        $validateData = $request->validate([
            'sk_bl' => 'required',
            'sb_bl' => 'required',
            'in_cash' => 'required',
            'trf_kppn' => 'required',
            'bunga_bnk' => 'required',
            'pph' => 'required',
            'admin_bank' => 'required',
            'sk_bi' => 'required',
            'sb_bi' => 'required'
        ]);

        Rekap::create($request->all());
        return redirect('/pengajuan')->with('success', 'Data berhasil di tambahkan');
    }
    public function pengajuan()
    {
        $data = Rekap::all();
        return view('pages.rekap.pengajuan', compact('data'));
    }
    public function Lrekap()
    {
        $data = Rekap::all();
        return view('pages.rekap.laporan-rekap', compact('data'));
    }
    public function destroy($id, Request $request)
    {
        $rekap = Rekap::find($id);
        $rekap->delete();
        return redirect('/pengajuan')->with('success', 'Data berhasil di Hapus');
    }
    public function detail($id)
    {
        $rekap = Rekap::find($id);
        return view('pages.rekap.detail', compact(['rekap']));
    }
    public function setuju($id)
    {
        $rekap = Rekap::find($id);
        $rekap->update(['status' => 2]);
        return redirect()->back();
    }
    public function tolak($id)
    {
        $rekap = Rekap::find($id);
        $rekap->update(['status' => 0]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $rekap = Rekap::find($id);
        return view('pages.rekap.edit', compact(['rekap']));
    }
    public function update($id, Request $request)
    {
        $validateData = $request->validate([
            'sk_bl' => 'required',
            'sb_bl' => 'required',
            'in_cash' => 'required',
            'trf_kppn' => 'required',
            'bunga_bnk' => 'required',
            'pph' => 'required',
            'admin_bank' => 'required',
            'sk_bi' => 'required',
            'sb_bi' => 'required'
        ]);


        $rekap = Rekap::find($id);
        $rekap->update(
            [
                'sk_bl' => $request->sk_bl,
                'sb_bl' => $request->sb_bl,
                'in_cash' => $request->in_cash,
                'trf_kppn' => $request->trf_kppn,
                'bunga_bnk' => $request->bunga_bnk,
                'pph' => $request->pph,
                'admin_bank' => $request->admin_bank,
                'sk_bi' => $request->sk_bi,
                'sb_bi' => $request->sb_bi
            ]
        );

        return redirect('/pengajuan')->with('success', 'Data berhasil di ubah');
    }
}

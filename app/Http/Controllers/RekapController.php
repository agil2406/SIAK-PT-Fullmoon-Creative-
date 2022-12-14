<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\Pesan;
use App\Models\Rekap;
use App\Models\User;
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
        $dari = $request->dari;
        $sampai = $request->sampai;
        $bulanawal = date('Y-m-d', strtotime('- 1 month', strtotime($request->dari)));
        $bulanakhir = date('Y-m-d', strtotime('- 1 month', strtotime($request->sampai)));
        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));
        $pengeluaran_bl = BukuKas::whereBetween('tanggal', [$bulanawal, $bulanakhir])->sum('pengeluaran');
        $penerimaan_bl = BukuKas::whereBetween('tanggal', [$bulanawal, $bulanakhir])->sum('penerimaan');
        $sk_bl = $penerimaan_bl - $pengeluaran_bl;
        $total_aset = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuaset')->sum('pengeluaran');
        $total_material = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukumaterial')->sum('pengeluaran');
        $total_operasional = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuoperasional')->sum('pengeluaran');
        $total_upah = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$dari, $sampai])->where('masters.jenisKas', 'bukuupah')->sum('pengeluaran');
        $total_pengeluaran = BukuKas::whereBetween('tanggal', [$dari, $sampai])->sum('pengeluaran');
        $total_penerimaan = BukuKas::whereBetween('tanggal', [$dari, $sampai])->sum('penerimaan');
        return view('pages.rekap.tambahRekap', compact('total_aset', 'total_material', 'total_upah', 'total_operasional', 'total_penerimaan', 'total_pengeluaran', 'sk_bl', 'dari', 'sampai'));
    }

    public function save(Request $request)
    {

        $validateData = $request->validate([
            'sk_bl' => 'required',
            'sb_bl' => 'required',
            'in_cash' => 'required',
            'bunga_bnk' => 'required',
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
            'bunga_bnk' => 'required',
            'pph' => 'required',
            'admin_bank' => 'required',
            'sk_bi' => 'required',
            'status' => 'required',
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
                'status' => $request->status,
                'sk_bi' => $request->sk_bi,
                'sb_bi' => $request->sb_bi
            ]
        );

        return redirect('/pengajuan')->with('success', 'Data berhasil di ubah');
    }
    public function printpdf($id)
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $rekap = Rekap::find($id);
        $hari = date('Y-m-d');
        $user = User::all();
        return view('pages.pdf.pdf', compact(['rekap', 'hari', 'user']));
    }
    public function pesan($id)
    {
        return view('pages.rekap.pesan', compact('id'));
    }
    public function detailpesan($id)
    {
        $data = Pesan::where('rekap_id', $id)->first();
        return view('pages.rekap.detail-pesan', compact('id', 'data'));
    }
    public function savepesan(Request $request)
    {
        $validateData = $request->validate([
            'pesan' => 'required'
        ]);
        Pesan::create([
            'pesan' => $request->pesan,
            'rekap_id' => $request->rekap_id
        ]);
        $rekap = Rekap::find($request->rekap_id);
        $rekap->update(['status' => 0]);
        return redirect('/laporan')->with('success', 'Data berhasil di tambahkan');
    }
    public function datarekap($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
        $total_pengeluaran = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->sum('pengeluaran');
        $total_penerimaan = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')->whereBetween('tanggal', [$this->dari, $this->sampai])->sum('penerimaan');
        $data = BukuKas::join('masters', 'buku_kas.master_id', '=', 'masters.id')
            ->whereBetween('tanggal', [$this->dari, $this->sampai])->orderBy('tanggal', 'asc')->get();
        return view('pages.pdf.data-rekap', compact('data', 'total_penerimaan', 'total_pengeluaran'));
    }
}

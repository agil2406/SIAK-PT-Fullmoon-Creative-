<?php

namespace App\Http\Controllers;

use App\Exports\BukukasExport;
use App\Models\BukuKas;
use App\Models\Master;
use App\Models\Proyek;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BukuKasController extends Controller
{
    public function index()
    {

        $data = BukuKas::all();
        return view('pages.bukukas.Kas', compact('data'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);
        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $data = BukuKas::whereBetween('tanggal', [$dari, $sampai])->get();
        $total_pengeluaran = BukuKas::whereBetween('tanggal', [$dari, $sampai])->sum('pengeluaran');
        $total_penerimaan = BukuKas::whereBetween('tanggal', [$dari, $sampai])->sum('penerimaan');

        if ($request->search) {
            $dari = date('Y-m-d', strtotime($request->dari));
            $sampai = date('Y-m-d', strtotime($request->sampai));
            $search = $request->search;
            $data = BukuKas::whereBetween('tanggal', [$dari, $sampai])->Where('uraian', 'like', '%' . $search . '%')->get();
            $total_pengeluaran = BukuKas::whereBetween('tanggal', [$dari, $sampai])->Where('uraian', 'like', '%' . $search . '%')->sum('pengeluaran');
            $total_penerimaan = BukuKas::whereBetween('tanggal', [$dari, $sampai])->Where('uraian', 'like', '%' . $search . '%')->sum('penerimaan');
        }


        return view('pages.bukukas.bukuKas', compact('data', 'total_pengeluaran', 'dari', 'sampai', 'total_penerimaan'));
    }


    public function export($dari, $sampai)
    {
        return Excel::download(new BukukasExport($dari, $sampai), 'bukukasumum.xlsx');
    }

    public function create()
    {

        $hari = date('Y-m-d');
        $uraian = Master::where('jenisKas', 'bukuaset')->orWhere('jenisKas', 'bukumaterial')->orWhere('jenisKas', 'bukuoperasional')->orWhere('jenisKas', 'bukuupah')->orderBy('jenisKas')->get();
        $proyek = Proyek::where('tgl_akhirproyek', '>', $hari)->get();
        return view('pages.bukukas.create', compact('uraian', 'proyek'));
    }
    public function save(Request $request)
    {
        $validateData = $request->validate([
            'uraian' => 'required',
            'harga' => 'required',
            'volume' => 'required',
            'master_id' => 'required',
            'tanggal' => 'required',
            'proyek_id' => 'required',
            'image' => 'required|image|file|max:2048',
            'noBukti' => 'required'
        ]);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('kwitansi', $file_name);
        BukuKas::create([
            'uraian' => $request->uraian,
            'harga' => $request->harga,
            'master_id' => $request->master_id,
            'image' => $image,
            'noBukti' => $request->noBukti,
            'satuan' => $request->satuan,
            'volume' => $request->volume,
            'pengeluaran' => $request->pengeluaran,
            'proyek_id' => $request->proyek_id,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/bukukas')->with('success', 'Data berhasil di tambahkan');
    }
    public function edit($id)
    {
        $uraian = Master::all();
        $proyek = Proyek::all();
        $bukukas = BukuKas::find($id);
        return view('pages.bukukas.edit', compact(['bukukas', 'proyek', 'uraian']));
    }
    public function detail($id)
    {
        $bukukas = BukuKas::find($id);
        return view('pages.bukukas.detail', compact(['bukukas']));
    }
    public function update($id, Request $request)
    {
        $validateData = $request->validate([
            'uraian' => 'required',
            'master_id' => 'required',
            'tanggal' => 'required',
            'proyek_id' => 'required',
            'noBukti' => 'required'
        ]);


        $bukukas = BukuKas::find($id);
        $bukukas->update(
            [
                'uraian' => $request->uraian,
                'master_id' => $request->master_id,
                'noBukti' => $request->noBukti,
                'harga' => $request->harga,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'pengeluaran' => $request->pengeluaran,
                'penerimaan' => $request->penerimaan,
                'proyek_id' => $request->proyek_id,
                'tanggal' => $request->tanggal
            ]
        );

        return redirect('/bukukas')->with('success', 'Data berhasil di ubah');
    }
    public function destroy($id, Request $request)
    {
        $bukukas = BukuKas::find($id);
        $bukukas->delete();
        return redirect('/bukukas')->with('success', 'Data berhasil di Hapus');
    }
    public function createpenerimaan()
    {

        $hari = date('Y-m-d');
        $uraian = Master::where('jenisKas', 'bukuaset')->orWhere('jenisKas', 'bukumaterial')->orWhere('jenisKas', 'bukuoperasional')->orWhere('jenisKas', 'bukuupah')->orderBy('jenisKas')->get();
        $proyek = Proyek::where('tgl_akhirproyek', '>', $hari)->get();
        return view('pages.bukukas.createpenerimaan', compact('uraian', 'proyek'));
    }
    public function savepenerimaan(Request $request)
    {
        $validateData = $request->validate([
            'uraian' => 'required',
            'master_id' => 'required',
            'tanggal' => 'required',
            'proyek_id' => 'required',
            'image' => 'required|image|file|max:2048'
        ]);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('kwitansi', $file_name);
        BukuKas::create([
            'uraian' => $request->uraian,
            'master_id' => $request->master_id,
            'image' => $image,
            'noBukti' => $request->noBukti,
            'penerimaan' => $request->penerimaan,
            'proyek_id' => $request->proyek_id,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/bukukas')->with('success', 'Data berhasil di tambahkan');
    }
}

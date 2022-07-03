<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\Master;
use App\Models\Proyek;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $time = Carbon::now('GMT+8');
        $waktu = Carbon::createFromTimeString('23:59');
        $hari = date('Y-m-d');
        $data = Proyek::all();
        return view('pages.proyek.Proyek', compact('data', 'hari', 'time', 'waktu'));
    }
    public function create()
    {
        return view('pages.proyek.create');
    }
    public function save(Request $request)
    {
        $validateData = $request->validate([
            'nama_proyek' => 'required',
            'alamat_proyek' => 'required',
            'tgl_awalproyek' => 'required',
            'tgl_akhirproyek' => 'required',
            'rab_proyek' => 'required'
        ]);

        Proyek::create($request->all());
        return redirect('/proyek')->with('success', 'Data berhasil di tambahkan');
    }
    public function destroy($id, Request $request)
    {
        $proyek = Proyek::find($id);
        $proyek->delete();
        return redirect('/proyek')->with('success', 'Data berhasil di Hapus');
    }
    public function detail($id)
    {
        $proyek = Proyek::find($id);
        $bukukas = BukuKas::where('proyek_id', $id)->get();
        $total_pengeluaran = BukuKas::where('proyek_id', $id)->sum('pengeluaran');
        $total_penerimaan = BukuKas::where('proyek_id', $id)->sum('penerimaan');
        return view('pages.proyek.detail', compact('proyek', 'bukukas', 'total_pengeluaran', 'total_penerimaan'));
    }
    public function edit($id)
    {
        $proyek = Proyek::find($id);
        return view('pages.proyek.edit', compact(['proyek']));
    }
    public function update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama_proyek' => 'required',
            'alamat_proyek' => 'required',
            'tgl_awalproyek' => 'required',
            'tgl_akhirproyek' => 'required',
            'rab_proyek' => 'required'
        ]);


        $proyek = proyek::find($id);
        $proyek->update(
            [
                'nama_proyek' => $request->nama_proyek,
                'alamat_proyek' => $request->alamat_proyek,
                'tgl_awalproyek' => $request->tgl_awalproyek,
                'tgl_akhirproyek' => $request->tgl_akhirproyek,
                'rab_proyek' => $request->rab_proyek
            ]
        );

        return redirect('/proyek')->with('success', 'Data berhasil di ubah');
    }
    public function createP($id)
    {

        $hari = date('Y-m-d');
        $uraian = Master::where('jenisKas', 'bukuaset')->orWhere('jenisKas', 'bukumaterial')->orWhere('jenisKas', 'bukuoperasional')->orWhere('jenisKas', 'bukuupah')->orderBy('jenisKas')->get();
        $proyek = proyek::find($id);
        return view('pages.proyek.createp', compact('uraian', 'proyek'));
    }
    public function createpenerimaan($id)
    {

        $hari = date('Y-m-d');
        $uraian = Master::where('jenisKas', 'bukuaset')->orWhere('jenisKas', 'bukumaterial')->orWhere('jenisKas', 'bukuoperasional')->orWhere('jenisKas', 'bukuupah')->orderBy('jenisKas')->get();
        $proyek = proyek::find($id);
        return view('pages.proyek.createpe', compact('uraian', 'proyek'));
    }
    public function saveP(Request $request)
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
        return redirect('/proyek')->with('success', 'Data berhasil di tambahkan');
    }
    public function savepenerimaan(Request $request)
    {
        $validateData = $request->validate([
            'uraian' => 'required',
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
            'master_id' => $request->master_id,
            'image' => $image,
            'noBukti' => $request->noBukti,
            'penerimaan' => $request->penerimaan,
            'proyek_id' => $request->proyek_id,
            'tanggal' => $request->tanggal
        ]);
        return redirect('/proyek')->with('success', 'Data berhasil di tambahkan');
    }
    public function cari()
    {
        $hari = date('Y-m-d');
        $proyek = Proyek::where('tgl_akhirproyek', '>', $hari)->get();
        return view('pages.proyek.cari-progres', compact('proyek'));
    }
    public function progres(Request $request)
    {
        $this->validate($request, [
            'proyek_id' => 'required'
        ]);
        $id = ($request->proyek_id);
        $proyek = Proyek::find($id);
        return view('pages.proyek.progres', compact('proyek'));
    }
    public function progresupdate($id, Request $request)
    {
        $validateData = $request->validate([
            'progres_proyek' => 'required'
        ]);
        $proyek = Proyek::find($id);
        $proyek->update([
            'progres_proyek' => $request->progres_proyek
        ]);
        return redirect('/proyek')->with('success', 'Data berhasil di ubah');
    }
}

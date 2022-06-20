<?php

namespace App\Http\Controllers;

use App\Exports\BukukasExport;
use App\Models\BukuKas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BukuKasController extends Controller
{
    public function index()
    {
        $data = BukuKas::all();
        return view('pages.bukukas.bukuKas', compact('data'));
    }
    public function export()
    {
        return Excel::download(new BukukasExport, 'bukukas.xlsx');
    }

    public function create()
    {
        return view('pages.bukukas.create');
    }
    public function save()
    {

        $attr = $this->validateRequest();
        $pengeluaran = request('pengeluaran');
        $penerimaan = request('penerimaan');
        $volume = request('volume');
        $satuan = request('satuan');
        $file_name = request()->image->getClientOriginalName();
        $image = request()->image->storeAs('kwitansi', $file_name);
        
        $attr['image']=$image;
        $attr['pengeluaran']=$pengeluaran;
        $attr['penerimaan']=$penerimaan;
        $attr['volume']=$volume;
        $attr['satuan']=$satuan;

        BukuKas::create($attr);
        return redirect('/bukukas')->with('success', 'Data berhasil di tambahkan');
    }
    public function edit($id)
    {
        $bukukas = BukuKas::find($id);
        return view('pages.bukukas.edit', compact(['bukukas']));
    }
    public function detail($id)
    {
        $bukukas = BukuKas::find($id);
        return view('pages.bukukas.detail', compact(['bukukas']));
    }
    public function update($id, Request $request)
    {
        $validateData = $request->validate([
            'jenisKas' => 'required',
            'uraian' => 'required',
            'jenisKas' => 'required',
            'tanggal' => 'required',
            'image' => 'required|image|file|max:2048',
            'noBukti' => 'required'
        ]);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('kwitansi', $file_name);

        $bukukas = BukuKas::find($id);
        $bukukas->update(
            [
                'uraian' => $request->uraian,
                'image' => $image,
                'noBukti' => $request->noBukti,
                'jenisKas' => $request->jenisKas,
                'pengeluaran' => $request->pengeluaran,
                'penerimaan' => $request->penerimaan,
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
    public function json()
    {
        return DataTables::of(BukuKas::limit(10))->make(true);
    }
    public function validateRequest()
    {
        return request()->validate([
            'jenisKas' => 'required',
            'uraian' => 'required',
            'tanggal' => 'required',
            'jenisKas' => 'required',
            'image' => 'required|image|file|max:2048',
            'noBukti' => 'required'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index()
    {

        return view('pages.master.dmaset', compact('data'));
    }
    public function aset()
    {
        $qr = DB::table('masters')->where('jenisKas', 'bukuaset')->select(DB::raw('MAX(RIGHT(kode_barang,4))as kode'));
        $kd = "";
        if ($qr->count() > 0) {
            foreach ($qr->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $data = Master::where('jenisKas', 'bukuaset')->get();
        return view('pages.master.dmaset', compact('data', 'kd'));
    }
    public function material()
    {
        $qr = DB::table('masters')->where('jenisKas', 'bukumaterial')->select(DB::raw('MAX(RIGHT(kode_barang,4))as kode'));
        $kd = "";
        if ($qr->count() > 0) {
            foreach ($qr->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $data = Master::where('jenisKas', 'bukumaterial')->get();
        return view('pages.master.dmmaterial', compact('data', 'kd'));
    }
    public function operasional()
    {
        $qr = DB::table('masters')->where('jenisKas', 'bukuoperasional')->select(DB::raw('MAX(RIGHT(kode_barang,4))as kode'));
        $kd = "";
        if ($qr->count() > 0) {
            foreach ($qr->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $data = Master::where('jenisKas', 'bukuoperasional')->get();
        return view('pages.master.dmoperasional', compact('data', 'kd'));
    }
    public function upah()
    {
        $qr = DB::table('masters')->where('jenisKas', 'bukuupah')->select(DB::raw('MAX(RIGHT(kode_barang,4))as kode'));
        $kd = "";
        if ($qr->count() > 0) {
            foreach ($qr->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $data = Master::where('jenisKas', 'bukuupah')->get();
        return view('pages.master.dmupah', compact('data', 'kd'));
    }
    public function saveAset(Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'

        ]);

        Master::create($request->all());
        return redirect('/dmbukuaset')->with('success', 'Data berhasil di tambahkan');
    }
    public function saveMaterial(Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenismaterial' => 'required',
            'jenisKas' => 'required'

        ]);

        Master::create($request->all());
        return redirect('/dmbukumaterial')->with('success', 'Data berhasil di tambahkan');
    }
    public function saveOperasional(Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'

        ]);

        Master::create($request->all());
        return redirect('/dmbukuoperasional')->with('success', 'Data berhasil di tambahkan');
    }
    public function saveUpah(Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'

        ]);

        Master::create($request->all());
        return redirect('/dmbukuupah')->with('success', 'Data berhasil di tambahkan');
    }
    public function destroyA($id, Request $request)
    {
        $master = Master::find($id);
        $master->delete();
        return redirect('/dmbukuaset')->with('success', 'Data berhasil di Hapus');
    }
    public function destroyM($id, Request $request)
    {
        $master = Master::find($id);
        $master->delete();
        return redirect('/dmbukumaterial')->with('success', 'Data berhasil di Hapus');
    }
    public function destroyO($id, Request $request)
    {
        $master = Master::find($id);
        $master->delete();
        return redirect('/dmbukuoperasional')->with('success', 'Data berhasil di Hapus');
    }
    public function destroyU($id, Request $request)
    {
        $master = Master::find($id);
        $master->delete();
        return redirect('/dmbukuupah')->with('success', 'Data berhasil di Hapus');
    }
    public function detail($id)
    {
        $master = Master::find($id);
        return view('pages.master.detail', compact('master'));
    }
    public function editA($id)
    {
        $master = Master::find($id);
        return view('pages.master.editA', compact(['master']));
    }
    public function editM($id)
    {
        $master = Master::find($id);
        return view('pages.master.editM', compact(['master']));
    }
    public function editO($id)
    {
        $master = Master::find($id);
        return view('pages.master.editO', compact(['master']));
    }
    public function editU($id)
    {
        $master = Master::find($id);
        return view('pages.master.editU', compact(['master']));
    }
    public function updateA($id, Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'
        ]);


        $master = master::find($id);
        $master->update(
            [
                'barang' => $request->barang,
                'jenisKas' => $request->jenisKas
            ]
        );

        return redirect('/dmbukuaset')->with('success', 'Data berhasil di ubah');
    }
    public function updateM($id, Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenismaterial' => 'required',
            'jenisKas' => 'required'
        ]);


        $master = master::find($id);
        $master->update(
            [
                'barang' => $request->barang,
                'jenismaterial' => $request->jenismaterial,
                'jenisKas' => $request->jenisKas
            ]
        );

        return redirect('/dmbukumaterial')->with('success', 'Data berhasil di ubah');
    }
    public function updateO($id, Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'
        ]);


        $master = master::find($id);
        $master->update(
            [
                'barang' => $request->barang,
                'jenisKas' => $request->jenisKas
            ]
        );

        return redirect('/dmbukuoperasional')->with('success', 'Data berhasil di ubah');
    }
    public function updateU($id, Request $request)
    {
        $validateData = $request->validate([
            'barang' => 'required',
            'jenisKas' => 'required'
        ]);


        $master = master::find($id);
        $master->update(
            [
                'barang' => $request->barang,
                'jenisKas' => $request->jenisKas
            ]
        );

        return redirect('/dmbukuupah')->with('success', 'Data berhasil di ubah');
    }
}

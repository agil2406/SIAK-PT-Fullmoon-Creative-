<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BukuKasController extends Controller
{
    public function index()
    {
        $data = BukuKas::all();
        return view('pages.bukukas.bukuKas', compact('data'));
    }

    public function create()
    {
        return view('pages.bukukas.create');
    }
    public function save(Request $request)
    {
        BukuKas::create($request->except(['_token']));
        return redirect('/bukukas');
    }
    public function edit($id)
    {
        $bukukas = BukuKas::find($id);
        return view('pages.bukukas.edit', compact(['bukukas']));
    }
    public function update($id, Request $request)
    {
        $bukukas = BukuKas::find($id);
        $bukukas->update($request->except(['_token']));
        return redirect('/bukukas');
    }
    public function destroy($id, Request $request)
    {
        $bukukas = BukuKas::find($id);
        $bukukas->delete();
        return redirect('/bukukas');
    }
    public function json()
    {
        return DataTables::of(BukuKas::limit(10))->make(true);
    }
}

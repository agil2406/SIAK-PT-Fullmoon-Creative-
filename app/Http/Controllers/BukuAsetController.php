<?php

namespace App\Http\Controllers;

use App\Models\BukuAset;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BukuAsetController extends Controller
{
    public function index()
    {
        $data = BukuAset::all();
        return view('pages.bukuaset.bukuAset', compact('data'));
    }

    public function create()
    {
        return view('pages.bukuaset.create');
    }
    public function save(Request $request)
    {
        BukuAset::create($request->except(['_token']));
        return redirect('/bukuaset');
    }
    public function edit($id)
    {
        $bukuaset = BukuAset::find($id);
        return view('pages.bukuaset.edit', compact(['bukuaset']));
    }
    public function update($id, Request $request)
    {
        $bukuaset = BukuAset::find($id);
        $bukuaset->update($request->except(['_token']));
        return redirect('/bukuaset');
    }
    public function destroy($id, Request $request)
    {
        $bukuaset = BukuAset::find($id);
        $bukuaset->delete();
        return redirect('/bukuaset');
    }
    public function json()
    {
        return DataTables::of(BukuAset::limit(10))->make(true);
    }
}

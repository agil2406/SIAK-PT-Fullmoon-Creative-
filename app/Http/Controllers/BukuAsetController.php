<?php

namespace App\Http\Controllers;

use App\Models\BukuAset;
use Illuminate\Http\Request;

class BukuAsetController extends Controller
{
    public function index()
    {
        $bukuaset = BukuAset::all();
        return view('pages.bukuaset.bukuAset', compact(['bukuaset']));
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
}

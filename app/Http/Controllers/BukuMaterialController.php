<?php

namespace App\Http\Controllers;

use App\Models\BukuMaterial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BukuMaterialController extends Controller
{
    public function index()
    {
        $data = BukuMaterial::all();
        return view('pages.bukumaterial.bukuMaterial', compact('data'));
    }

    public function create()
    {
        return view('pages.bukumaterial.create');
    }
    public function save(Request $request)
    {
        BukuMaterial::create($request->except(['_token']));
        return redirect('/bukumaterial');
    }
    public function edit($id)
    {
        $bukumaterial = BukuMaterial::find($id);
        return view('pages.bukumaterial.edit', compact(['bukumaterial']));
    }
    public function update($id, Request $request)
    {
        $bukumaterial = BukuMaterial::find($id);
        $bukumaterial->update($request->except(['_token']));
        return redirect('/bukumaterial');
    }
    public function destroy($id, Request $request)
    {
        $bukumaterial = BukuMaterial::find($id);
        $bukumaterial->delete();
        return redirect('/bukumaterial');
    }
    public function json()
    {
        return DataTables::of(BukuMaterial::limit(10))->make(true);
    }
}

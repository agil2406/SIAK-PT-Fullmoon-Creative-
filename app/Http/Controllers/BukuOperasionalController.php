<?php

namespace App\Http\Controllers;

use App\Models\BukuOperasional;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BukuOperasionalController extends Controller
{
    public function index()
    {
        $data = BukuOperasional::all();
        return view('pages.bukuoperasional.bukuOperasional', compact('data'));
    }

    public function create()
    {
        return view('pages.bukuoperasional.create');
    }
    public function save(Request $request)
    {
        BukuOperasional::create($request->except(['_token']));
        return redirect('/bukuoperasional');
    }
    public function edit($id)
    {
        $bukuoperasional = BukuOperasional::find($id);
        return view('pages.bukuoperasional.edit', compact(['bukuoperasional']));
    }
    public function update($id, Request $request)
    {
        $bukuoperasional = BukuOperasional::find($id);
        $bukuoperasional->update($request->except(['_token']));
        return redirect('/bukuoperasional');
    }
    public function destroy($id, Request $request)
    {
        $bukuoperasional = BukuOperasional::find($id);
        $bukuoperasional->delete();
        return redirect('/bukuoperasional');
    }
    public function json()
    {
        return DataTables::of(BukuOperasional::limit(10))->make(true);
    }
}

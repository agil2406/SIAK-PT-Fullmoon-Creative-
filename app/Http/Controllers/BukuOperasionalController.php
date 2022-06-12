<?php

namespace App\Http\Controllers;

use App\Models\BukuOperasional;
use Illuminate\Http\Request;

class BukuOperasionalController extends Controller
{
    public function index()
    {
        $bukuoperasional = BukuOperasional::all();
        return view('pages.bukuoperasional.bukuOperasional', compact(['bukuoperasional']));
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
}

<?php

namespace App\Http\Controllers;

use App\Models\BukuUpah;
use Illuminate\Http\Request;

class BukuUpahController extends Controller
{
    public function index()
    {
        $bukuupah = BukuUpah::all();
        return view('pages.bukuupah.bukuUpah', compact(['bukuupah']));
    }

    public function create()
    {
        return view('pages.bukuupah.create');
    }
    public function save(Request $request)
    {
        BukuUpah::create($request->except(['_token']));
        return redirect('/bukuupah');
    }
    public function edit($id)
    {
        $bukuupah = BukuUpah::find($id);
        return view('pages.bukuupah.edit', compact(['bukuupah']));
    }
    public function update($id, Request $request)
    {
        $bukuupah = BukuUpah::find($id);
        $bukuupah->update($request->except(['_token']));
        return redirect('/bukuupah');
    }
    public function destroy($id, Request $request)
    {
        $bukuupah = BukuUpah::find($id);
        $bukuupah->delete();
        return redirect('/bukuupah');
    }
}

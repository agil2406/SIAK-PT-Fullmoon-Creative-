@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Kas Umum</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Buku Kas Umum</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">

    <div class="container">
      <a href="/bukukas/create" class="btn btn-primary mb-3 mt-2">Tambah Data</a>

      <table id="example" class="table table-bordered table-hover">
        <tr>
          <th>No</th>
          <th>Uraian</th>
          <th>Tanggal </th>
          <th>Volume</th>
          <th>Satuan</th>
          <th>No.Bukti</th>
          <th>Penerimaan</th>
          <th>Pengeluaran</th>
          <th>Aksi</th>
        </tr>
        @foreach ($bukukas as $s)
        <tbody>
          <td>{{$s->id}}</td>
          <td>{{$s->uraian_bk}}</td>
          <td>{{$s->tanggal_bk}}</td>
          <td>{{$s->volume_bk}}</td>
          <td>{{$s->satuan_bk}}</td>
          <td>{{$s->noBukti_bk}}</td>
          <td>{{$s->penerimaan_bk}}</td>
          <td>{{$s->pengeluaran_bk}}</td>
          <td>
            <div class="row">
              <div class="col-sm-4">
                <a href="/bukukas/{{$s->id}}/edit" class="btn mb-1 btn-sm btn-warning btn-block">Ubah</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <form action="/bukukas/{{$s->id}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger btn-block" type="submit" value="Delete">Hapus</button>
                </form>
              </div>
            </div>
    </div>
    </td>
    </tbody>
    @endforeach
    </table>
  </div>
</div>
</div>
@endsection
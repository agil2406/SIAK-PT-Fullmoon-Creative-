@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Upah</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Buku Upah</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">

    <div class="container">
      <a href="/bukukas/create" class="btn btn-primary mb-3 mt-2">Tambah Data</a>
      <a href="/bukuupah/export" class="btn btn-success mb-3 mt-2">Export Excel</a>

      <table id="datatables" class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th> URAIAN </th>
            <th> TANGGAL </th>
            <th> VOLUME </th>
            <th> SATUAN </th>
            <th> NO BUKTI </th>
            <th> JUMLAH </th>
            <th> AKSI </th>

          </tr>
        </thead>

        <tbody>
          @foreach ($data as $d )
          <tr>
            <td> {{$d->uraian_bk}}</td>
            <td> {{$d->tanggal_bk}}</td>
            <td> {{$d->volume_bk}}</td>
            <td> {{$d->satuan_bk}}</td>
            <td> {{$d->noBukti_bk}}</td>
            <td> {{$d->pengeluaran_bk}}</td>
            <td>
              <div class="row">
                <div class="col-sm-4">
                  <a href="/bukukas/{{$d->id}}/edit" class="btn mb-2 btn-sm btn-warning btn-block">Detail</a>
                </div>

              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>


@endsection
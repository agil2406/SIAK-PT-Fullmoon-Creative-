@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Operasional</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Buku Operasional</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">

    <div class="container">
      <a href="/bukuoperasional/create" class="btn btn-primary mb-3 mt-2">Tambah Data</a>

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
        @foreach ($data as $d )
        <tr>
          <td> {{$d->uraian_bo}}</td>
          <td> {{$d->tanggal_bo}}</td>
          <td> {{$d->volume_bo}}</td>
          <td> {{$d->satuan_bo}}</td>
          <td> {{$d->noBukti_bo}}</td>
          <td> {{$d->jumlah_bo}}</td>
          <td>
            <div class="row">
              <div class="col-sm-4">
                <a href="/bukuoperasional/{{$d->id}}/edit" class="btn mb-2 btn-sm btn-warning btn-block">Detail</a>
              </div>

            </div>
          </td>
        </tr>
        @endforeach
        <tbody>

        </tbody>
      </table>

    </div>
  </div>
</div>



@endsection
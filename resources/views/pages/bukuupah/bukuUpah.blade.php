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
      <a href="/bukuupah/create" class="btn btn-primary mb-3 mt-2">Tambah Data</a>

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
            <td> {{$d->uraian_bu}}</td>
            <td> {{$d->tanggal_bu}}</td>
            <td> {{$d->volume_bu}}</td>
            <td> {{$d->satuan_bu}}</td>
            <td> {{$d->noBukti_bu}}</td>
            <td> {{$d->jumlah_bu}}</td>
            <td>
              <div class="row">
                <div class="col-sm-4">
                  <a href="/bukuupah/{{$d->id}}/edit" class="btn mb-2 btn-sm btn-warning btn-block">Detail</a>
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
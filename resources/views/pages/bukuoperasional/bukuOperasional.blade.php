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

      <table id="example" class="table table-bordered table-hover">
        <tr>
          <th>No</th>
          <th>Uraian</th>
          <th>Tanggal </th>
          <th>Volume</th>
          <th>Satuan</th>
          <th>No.Bukti</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
        @foreach ($bukuoperasional as $s)
        <tbody>
          <td>{{$s->id}}</td>
          <td>{{$s->uraian_bo}}</td>
          <td>{{$s->tanggal_bo}}</td>
          <td>{{$s->volume_bo}}</td>
          <td>{{$s->satuan_bo}}</td>
          <td>{{$s->noBukti_bo}}</td>
          <td>{{$s->jumlah_bo}}</td>
          <td>
            <div class="row">
              <div class="col-sm-4">
                <a href="/bukuoperasional/{{$s->id}}/edit" class="btn mb-2 btn-sm btn-warning btn-block">Ubah</a>
              </div>
              <div class="col-sm-4">
                <form action="/bukuoperasional/{{$s->id}}" method="POST">
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
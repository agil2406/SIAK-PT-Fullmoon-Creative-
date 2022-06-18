@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Material</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Buku Material</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card" style="width: 90%">
  <div class="card-body">

    <div class="container">
      <a href="/bukukas/create" class="btn btn-primary mb-3 mt-2">Tambah Data</a>
      <a href="/bukumaterial/export" class="btn btn-success mb-3 mt-2">Export Excel</a>
      <table>
        <tbody>
          <tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
          </tr>
          <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
          </tr>
      </table>

      <table id="datatables" class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th> URAIAN </th>
            <th> TANGGAL </th>
            <th> VOLUME </th>
            <th> NO BUKTI </th>
            <th> PENERIMAAN </th>
            <th> PENGELUARAN </th>
            <th> AKSI </th>


          </tr>
        </thead>

        <tbody>
          @foreach ($data as $d )
          <tr>
            <td> {{$d->uraian}}</td>
            <td> {{$d->tanggal}}</td>
            <td> {{$d->volume}}</td>
            <td> {{$d->noBukti}}</td>
            <td> @if ($d->penerimaan == NULL) Rp.- @else Rp.{{$d->penerimaan}} @endif</td>
            <td> Rp.{{$d->pengeluaran}}</td>
            <td>
              <div class="row">
                <div class="col-sm-4">

                  <a href="/bukukas/{{$d->id}}/edit" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i></a>
                </div>
                <div class="col-sm-4 m-auto">

                  <a href="/bukukas/{{$d->id}}/detail" class="btn btn-success"><i class="bi bi-info-circle"></i></a>
                </div>
              </div>
              <div class="mt-2">
                <form action="/bukukas/{{$d->id}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus ?')"><i class="bx bxs-trash"></i></button>
                </form>
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
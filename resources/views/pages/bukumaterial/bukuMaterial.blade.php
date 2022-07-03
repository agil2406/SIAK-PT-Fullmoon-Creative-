@extends('layouts.app')

@section('title')
Buku Material
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Material</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item">Buku Material</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card" style="width: 90%">
  <div class="card-body">

    <div class="container">
      <a href="{{url('bukukas/create')}}" class="btn btn-primary mb-3 mt-2">Tambah Data</a>
      <a href="{{url('bukumaterial/export').'/'.$dari.'/'.$sampai}}" class="btn btn-success mb-3 mt-2">Export Excel</a>

      <table id="datatables" class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th> URAIAN </th>
            <th> TANGGAL </th>
            <th> VOLUME </th>
            <th> HARGA </th>
            <th> PENGELUARAN </th>
            <th> AKSI </th>


          </tr>
        </thead>

        <tbody>
          @foreach ($data as $d )
          <tr>
            <td> {{$d->uraian}}</td>
            <td> {{date('d M Y',strtotime($d->tanggal))}}</td>
            <td> {{$d->volume}}</td>
            <td> Rp.{{number_format($d->harga,0)}}</td>
            <td> Rp.{{number_format($d->pengeluaran,0)}}</td>
            <td>
              <div class="row">
                <div class="col-sm-4">

                  <a href="{{url('bukukas').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                </div>
                <div class="col-sm-4 m-auto">

                  <a href="{{url('bukukas').'/'.$d->id.'/detail'}}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                </div>
              </div>
              <div class="mt-2">
                <form action="{{url('bukukas').'/'.$d->id}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus ?')"><i class="bx bxs-trash"></i></button>
                </form>
              </div>

            </td>
          </tr>
          @endforeach
        </tbody>
        <th class=" text-center">JUMLAH</th>
        <td></td>
        <td></td>
        <td></td>
        <td>Rp.{{number_format($total,0)}}</td>
      </table>


    </div>
  </div>
</div>



@endsection
@extends('layouts.app')

@section('title')
Buku Kas Umum
@endsection

@section('content')
<div class="pagetitle">
  <h1>Buku Kas Umum</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item">Buku Kas Umum</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body">

    <div class="container">
      <a href="{{url('bukukas/create')}}" class="btn btn-danger mb-3 mt-2">Tambah Pengeluaran</a>
      <a href="{{url('bukukas/createpenerimaan')}}" class="btn btn-primary mb-3 mt-2">Tambah Penerimaan</a>
      <a href="{{url('bukukas/export').'/'.$dari.'/'.$sampai}}" class="btn btn-success mb-3 mt-2">Export Excel</a>

      <table id="datatables" class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th> NO </th>
            <th> URAIAN </th>
            <th> TANGGAL </th>
            <th> PENERIMAAN </th>
            <th> PENGELUARAN </th>
            <th> SALDO </th>
            <th> AKSI </th>


          </tr>
        </thead>

        <tbody>
          <?php
          $saldo = 0;
          ?>
          @foreach ($data as $d )
          <tr>
            <td> {{$loop->iteration}}</td>
            <td> {{$d->uraian}}</td>
            <td> {{date('d M Y',strtotime($d->tanggal))}}</td>
            <td> Rp.{{number_format($d->penerimaan,0)}}</td>
            <td> Rp.{{number_format($d->pengeluaran,0)}}</td>
            <?php
            $saldo =  $saldo + ($d->penerimaan - $d->pengeluaran);
            ?>
            <td> Rp.{{number_format($saldo,0)}}</td>
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
        <th class=" text-center" colspan="3">SALDO</th>
        <td>Rp.{{number_format($total_penerimaan,0)}}</td>
        <td>Rp.{{number_format($total_pengeluaran,0)}}</td>
        <?php
        $saldoakhir = $total_penerimaan - $total_pengeluaran;
        ?>
        <td>Rp.{{number_format($saldoakhir,0)}}</td>
        <td></td>
      </table>

    </div>
  </div>
</div>



@endsection
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
            <h5 class="card-title">Buku Upah </h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                Filter <i class="bx bxs-filter-alt"></i>
            </button>
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Masukkan Tanggal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="container">
                            <form action="{{url('cariupah')}}" method="get">
                                @csrf
                                <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="dari" value="{{ old('dari')}}">
                                </div>
                                <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="sampai" value="{{ old('sampai')}}">
                                </div>
                                <div class=" modal-footer">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div><!-- End Basic Modal-->
            <table id="datatables" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> URAIAN </th>
                        <th> TANGGAL </th>
                        <th> PENGELUARAN </th>
                        <th> AKSI </th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td> {{$d->uraian}}</td>
                        <td> {{ date('d M Y',strtotime($d->tanggal))}}</td>
                        <td> @if ($d->pengeluaran == NULL) Rp.- @else Rp.{{ number_format($d->pengeluaran,0)}} @endif</td>
                        <td class="align-items-center">
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
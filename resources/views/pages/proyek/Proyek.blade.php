@extends('layouts.app')

@section('title')
Data Proyek
@endsection

@section('content')
<div class="pagetitle">
    <h1>Proyek</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Proyek</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="card">
    <div class="card-body">

        <div class="container">

            <h5 class="card-title">Proyek</h5>

            <a href="{{url('buatproyek')}}" class="btn btn-primary mb-3">Tambah Data</a>




            <table id="datatables" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> NAMA PROYEK </th>
                        <th> ALAMAT PROYEK </th>
                        <th> STATUS </th>
                        <th> RAB PROYEK </th>
                        <th> AKSI </th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td> {{$d->nama_proyek}}</td>
                        <td> {{$d->alamat_proyek}}</td>
                        @if ($d->tgl_akhirproyek <= $hari ) <td>
                            <div class="d-flex justify-content-center mt-2">
                                <span class="badge bg-success">Selesai</span>
                            </div>
                            </td>
                            @else
                            <td>
                                <div class="d-flex justify-content-center mt-2">
                                    <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                                </div>
                            </td>
                            @endif
                            <td>Rp.{{number_format($d->rab_proyek,0)}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-4">

                                        <a href="{{url('proyek').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                    </div>
                                    <div class="col-sm-4 m-auto">

                                        <a href="{{url('proyek').'/'.$d->id.'/detail'}}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <form action="{{url('proyek').'/'.$d->id}}" method="POST">
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
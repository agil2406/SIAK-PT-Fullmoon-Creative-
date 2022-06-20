@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
    <h1>Laporan Pengajuan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Laporan Pengajuan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pengajuan Rekapan </h5>

        <div class="container">

            <table id="datatables" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> TANGGAL </th>
                        <th> STATUS</th>
                        <th> AKSI </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td> {{date('d M Y',strtotime($d->created_at))}}</td>
                        @if ($d->status == 1 )
                        <td> <span class="badge bg-warning text-dark">Sedang Proses</span> </td>
                        @elseif ($d->status == 0)
                        <td> <span class="badge bg-danger">Ditolak</span> </td>
                        @else
                        <td> <span class="badge bg-success">Diterima</span> </td>
                        @endif
                        <td>
                            <div class="row">
                                <div class="col-sm-4">

                                    <a href="{{url('rekap').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i></a>
                                </div>
                                <div class="col-sm-4 m-auto">

                                    <a href="{{url('rekap').'/'.$d->id.'/detail'}}" class="btn btn-success"><i class="bi bi-info-circle"></i></a>
                                </div>
                            </div>
                            <div class="mt-2">
                                <form action="{{url('rekap').'/'.$d->id}}" method="POST">
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
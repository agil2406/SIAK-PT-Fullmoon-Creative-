@extends('layouts.app')

@section('title')
Pengajuan
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
                        <th>
                            <div class="row justify-content-center">
                                NO
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                TANGGAL
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                STATUS
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                AKSI
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                {{$loop->iteration}}
                            </div>
                        </td>
                        <td>
                            <div class="row justify-content-center">
                                {{date('d M Y',strtotime($d->created_at))}}
                            </div>
                        </td>
                        @if ($d->status == 1 )
                        <td>
                            <div class="d-flex justify-content-center mt-2">
                                <span class="badge bg-warning text-dark">Sedang Proses</span>
                            </div>
                        </td>
                        @elseif ($d->status == 0)
                        <td>
                            <div class="d-flex justify-content-center mt-2">
                                <span class="badge bg-danger">Ditolak</span>
                            </div>
                        </td>
                        @else
                        <td>
                            <div class="d-flex justify-content-center mt-2">
                                <span class="badge bg-success">Diterima</span>
                            </div>
                        </td>
                        @endif
                        @if($d->status == 1)
                        <td class="align-items-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-2">
                                    <a href="{{url('rekap').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{url('rekap').'/'.$d->id.'/detail'}}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{url('rekap').'/'.$d->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus ?')"><i class="bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        @elseif($d->status==0)
                        <td class="align-items-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-2">
                                    <a class="badge bg-danger" href="{{url('pesan').'/'.$d->id.'/detail'}}"> Pesan </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{url('rekap').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                </div>
                            </div>
                        </td>
                        @else
                        <td class="align-items-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-5">
                                    <a href="{{url('rekap').'/'.$d->id.'/'.'pdf'}}" target="_blank" class="btn btn-danger mb-3">Print PDF</a>
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
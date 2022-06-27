@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')

<div class="pagetitle">
    <h1>Detail Proyek</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/proyek')}}">Proyek</a> </li>
            <li class="breadcrumb-item active">Detail Proyek</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row center d-flex align-items-center mt-3">
                <div class="col-md-12">
                    <h4 class="mb-0" style="color:black;">{{$proyek->nama_proyek}}</h4>
                    <p class="fs-10 mb-0" style="font-family: times-new-roman ;">{{$proyek->alamat_proyek}}</p>
                    <span class="fs-5 mr-5 mb-0" style="font-family: times-new-roman ;">{{date('d M Y',strtotime($proyek->tgl_awalproyek))}} - {{date('d M Y',strtotime($proyek->tgl_akhirproyek))}}</span>
                </div>
            </div>
            <hr class="mb-5">
            <div class="row right">
                <span> <b>RAB PROYEK : Rp.{{number_format($proyek->rab_proyek,0)}}</b></span>
            </div>
            <a href="{{url('proyek').'/'.$proyek->id.'/createp'}}" class="btn btn-primary mb-3 mt-2">Tambah Data</a>
            <a href="{{url('proyek').'/'.$proyek->id.'/createp'}}" class="btn btn-danger mb-3 mt-2">Print PDF</a>
            <div class="row mt-3">
                <div class="col-md-12">
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
                                        Uraian
                                    </div>
                                </th>
                                <th>
                                    <div class="row justify-content-center">
                                        Volume
                                    </div>
                                </th>
                                <th>
                                    <div class="row justify-content-center">
                                        Pengeluaran
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bukukas as $p)
                            <tr>
                                <td>
                                    <div class="row justify-content-center">
                                        {{$loop->iteration}}
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        {{$p->master->uraian}}
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        {{$p->volume}}
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        Rp.{{number_format($p->pengeluaran,0)}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <th>Saldo</th>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
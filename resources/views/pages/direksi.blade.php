@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengeluaran <span>| Minggu Ini</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Rp.{{number_format($pengeluaran_minggu)}}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengeluaran <span>| Bulan Ini</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Rp.{{number_format($pengeluaran_bulan)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Proyek <span>| Sedang Berlangsung</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{$proyek->count()}} Proyek</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                @foreach ($proyek as $p)
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h4> <b>
                                        <a href="{{url('proyek').'/'.$p->id.'/detail'}}">
                                            <center>{{$p->nama_proyek}}</center>
                                        </a>
                                    </b></h4>
                                <span class=" m-auto"> <b> RAB : Rp.{{number_format($p->rab_proyek,0)}}</b></span>
                            </div>
                        </div>
                        <?php $a = $p->rab_proyek;
                        $b = $p->progres_proyek;
                        $c = $p->buku_kas->sum('pengeluaran');
                        $d = ($c / $a) * 100;
                        ?>
                        <span class=" m-auto"> <b> Penggunaan RAB Proyek ( Buku Kas ) : Rp.{{number_format($p->buku_kas->sum('pengeluaran'),0)}} </b></span>
                        <div class="progress progress-striped active mt-3">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="{{$d}}" aria-valuemax="100" style="width:{{$d}}%;">
                                <span class="sr-only">{{$d}}%</span>
                            </div>
                        </div>
                        <span class=" m-auto"> <b> Penggunaan RAB Proyek ( Lapangan )</b></span>
                        <div class="progress progress-striped active mt-3">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="{{$b}}" aria-valuemax="100" style="width:{{$b}}%;">
                                <span class="sr-only">{{$b}}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


    <div class="container">
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('proyek')}}">Tabel Proyek</a></h5>
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
                                            Nama Proyek
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row justify-content-center">
                                            Status
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row justify-content-center">
                                            RAB
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($proyeks as $p)
                                <tr>
                                    <td>
                                        <div class="row justify-content-center">
                                            {{$loop->iteration}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            {{$p->nama_proyek}}
                                        </div>
                                    </td>
                                    @if ($p->tgl_akhirproyek <= $hari ) <td>
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
                                        <td>
                                            <div class="row justify-content-center">
                                                Rp.{{number_format($p->rab_proyek,0)}}
                                            </div>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('laporan')}}">Tabel Pengajuan</a></h5>
                    <div class="col-md-12">
                        <table id="datatabless" class="table table-striped table-hover table-bordered">
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

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    @foreach ($pengajuan as $p)
                                    <td>
                                        <div class="row justify-content-center">
                                            {{$loop->iteration}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            {{date('d M Y',strtotime($p->created_at))}}
                                        </div>
                                    </td>
                                    @if ($p->status == 1 )
                                    <td>
                                        <div class="d-flex justify-content-center mt-2">
                                            <span class="badge bg-warning text-dark">Sedang Proses</span>
                                        </div>
                                    </td>
                                    @elseif ($p->status == 0)
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
                                    @endforeach
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
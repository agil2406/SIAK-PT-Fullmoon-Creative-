@extends('layouts.app')

@section('title')
Tambah Data Buku Kas

@section('content')

<div class="pagetitle">
    <h1>Detail Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Rekap Buku Kas</li>
            <li class="breadcrumb-item active">Detail Rekap</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Rekap</h5>
        <a href="{{url('rekap').'/'.$rekap->id.'/'.'pdf'}}" class="btn btn-danger mb-3">Print PDF</a>

        <!-- Horizontal Form -->
        <form action="{{url('buatrekap/save')}}" method="POST">
            @csrf
            <h7 class="card-title">Saldo Awal</h7>
            <div class="row mb-3">
                <label for="sk_bl" class="col-sm-2 col-form-label">Saldo Kas Bulan Lalu</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control @error('sk_bl') is-invalid  @enderror" name="sk_bl" value="{{ $rekap->sk_bl}}" readonly>
                    @error('sk_bl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="sb_bl" class="col-sm-2 col-form-label">Saldo Bank Bulan Lalu</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control @error('sb_bl') is-invalid  @enderror" name="sb_bl" value="{{ $rekap->sb_bl}}" readonly>
                    @error('sb_bl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <h7 class="card-title">Pemasukan Bulan Ini</h7>
            <div class="row mb-3">
                <label for="in_cash" class="col-sm-2 col-form-label">In Cash</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control @error('in_cash') is-invalid  @enderror" name="in_cash" value="{{ $rekap->in_cash}}" readonly>
                    @error('in_cash')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="trf_kppn" class="col-sm-2 col-form-label">Transfer Dana Dari KPPN</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control @error('trf_kppn') is-invalid  @enderror" name="trf_kppn" value="{{ $rekap->trf_kppn}}" readonly>
                    @error('trf_kppn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="bunga_bnk" class="col-sm-2 col-form-label">Bunga Tabungan Bank</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control @error('bunga_bnk') is-invalid  @enderror" name="bunga_bnk" value="{{ $rekap->bunga_bnk}}" readonly>
                    @error('bunga_bnk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <h7 class="card-title">Pengeluaran Bulan Ini</h7>
            <div class="row mb-3">
                <label for="total_material" class="col-sm-2 col-form-label">Total Biaya Material</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="total_material" value="{{$rekap->total_material}}" readonly>
                </div>
                <label for="total_upah" class="col-sm-2 col-form-label">Total Biaya Upah Kerja</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="total_upah" value="{{$rekap->total_upah}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="total_aset" class="col-sm-2 col-form-label">Total Biaya Aset</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="total_aset" value="{{$rekap->total_aset}}" readonly>
                </div>
                <label for="total_operasional" class="col-sm-2 col-form-label">Total Biaya Operasional</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="total_operasional" value="{{$rekap->total_operasional}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="pph" class="col-sm-2 col-form-label">PPH</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="pph" value="{{ $rekap->pph}}" readonly>
                </div>
                <label for="admin_bank" class="col-sm-2 col-form-label">Administrasi Bank</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="admin_bank" value="{{ $rekap->admin_bank}}" readonly>
                </div>
            </div>
            <h7 class="card-title">Saldo Akhir </h7>
            <div class="row mb-3">
                <label for="sk_bi" class="col-sm-2 col-form-label">Saldo Kas</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="sk_bi" value="{{ $rekap->sk_bi}}" readonly>
                </div>
                <label for="sb_bi" class="col-sm-2 col-form-label">Saldo Bank</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="sb_bi" value="{{ $rekap->sb_bi}}" readonly>
                </div>
            </div>


            <div class="text-center mt-3">
                <a href="{{url('/rekap')}}" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
@extends('layouts.app')

@section('title')
Tambah Rekap Proyek
@endsection

@section('content')
<?php
$saldo = $total_penerimaan - $total_pengeluaran;
?>


<div class="pagetitle">
    <h1>Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Rekap Buku Kas</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Rekap Buku Kas</h5>
        <div class="col-sm-5">
            <a href="{{url('rekap').'/'.$dari.'/'.$sampai }}" target="_blank" class="btn btn-danger mb-3">Data Rekap</a>
        </div>
        <!-- Horizontal Form -->
        <form action="{{url('buatrekap/save')}}" method="POST">
            @csrf
            <h7 class="card-title">Saldo Awal</h7>
            <div class="row mb-3">
                <label for="sk_bl" class="col-sm-2 col-form-label">Saldo Kas Bulan Lalu</label>
                <div class="col-sm-4">
                    @if($sk_bl == NULL)
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('sk_bl') is-invalid  @enderror" name="sk_bl" value="{{ old('sk_bl')}}" onkeyup="sum1();">
                        @error('sk_bl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @else
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('sk_bl') is-invalid  @enderror" name="sk_bl" id="sk_bl" value="{{$sk_bl}}" readonly onkeyup="sum1();">
                        @error('sk_bl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                </div>
                <label for="sb_bl" class="col-sm-2 col-form-label">Saldo Bank Bulan Lalu</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('sb_bl') is-invalid  @enderror" name="sb_bl" id="sb_bl" value="{{ old('sb_bl')}}" onkeyup="sum1();">
                        @error('sb_bl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <label for="sb_bl" class="col-sm-2 col-form-label">Jumlah Saldo Awal</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('sb_bl') is-invalid  @enderror" id="jml_saldo" value="" onkeyup="sum1();" readonly>
                        @error('sb_bl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <h7 class="card-title">Pemasukan Bulan Ini</h7>
            <div class="row mb-3">
                <label for="in_cash" class="col-sm-2 col-form-label">In Cash</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('in_cash') is-invalid  @enderror" name="in_cash" id="in_cash" value="{{ old('in_cash')}}" onkeyup="sum2();">
                        @error('in_cash')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <label for="trf_kppn" class="col-sm-2 col-form-label">Transfer Dana Dari KPPN</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="trf_kppn" value="{{ old('trf_kppn')}}" onkeyup="sum2();" id="trf_kppn">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="bunga_bnk" class="col-sm-2 col-form-label">Bunga Tabungan Bank</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('bunga_bnk') is-invalid  @enderror" name="bunga_bnk" value="{{ old('bunga_bnk')}}" onkeyup="sum2();" id="bunga_bnk">
                        @error('bunga_bnk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="bunga_bnk" class="col-sm-2 col-form-label">Jumlah Pemasukan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('bunga_bnk') is-invalid  @enderror" id="jml_pemasukan" value="" onkeyup="sum2();" readonly>
                        @error('bunga_bnk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <h7 class="card-title">Pengeluaran Bulan Ini</h7>
            <div class="row mb-3">
                <label for="total_material" class="col-sm-2 col-form-label">Total Biaya Material</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="total_material" value="{{$total_material}}" id="material" onkeyup="sum3();" readonly>
                    </div>
                </div>
                <label for="total_upah" class="col-sm-2 col-form-label">Total Biaya Upah Kerja</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="total_upah" value="{{$total_upah}}" id="upah" onkeyup="sum3();" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="total_aset" class="col-sm-2 col-form-label">Total Biaya Aset</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="total_aset" value="{{$total_aset}}" onkeyup="sum3();" id="aset" readonly>
                    </div>
                </div>
                <label for="total_operasional" class="col-sm-2 col-form-label">Total Biaya Operasional</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="total_operasional" value="{{$total_operasional}}" onkeyup="sum3();" id="operasional" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="pph" class="col-sm-2 col-form-label">PPH</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="pph" value="" id="pph" onkeyup="sum3();">
                    </div>
                </div>
                <label for="admin_bank" class="col-sm-2 col-form-label">Administrasi Bank</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="admin_bank" id="admn" value="" onkeyup="sum3();">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="pph" class="col-sm-2 col-form-label">Jumlah Pengeluaran</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="jml_pengeluaran" value="" readonly>
                    </div>
                </div>
            </div>
            <h7 class="card-title">Saldo Akhir </h7>
            <div class="row mb-3">
                <label for="sk_bi" class="col-sm-2 col-form-label">Saldo Kas</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="sk_bi" value="{{$saldo}}" readonly>
                    </div>
                </div>
                <label for="sb_bi" class="col-sm-2 col-form-label">Saldo Bank</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="sb_bi">
                    </div>
                </div>
            </div>
            <input type="number" value="1" name="status" hidden>


            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="{{url('/rekap')}}" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
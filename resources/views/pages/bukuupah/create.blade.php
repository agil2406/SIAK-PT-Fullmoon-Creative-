@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon

@section('content')

<div class="pagetitle">
    <h1>Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/bukuupah') }}">Home</a></li>
            <li class="breadcrumb-item">Buku Upah</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buku Upah</h5>

        <!-- Horizontal Form -->
        <form action="/bukuupah/save" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="uraian_bu" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="uraian_bu">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_bu" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal_bu">
                </div>
                <label for="volume_bu" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume_bu">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan_bu" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan_bu">
                </div>
                <label for="noBukti_bu" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="noBukti_bu">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jumlah_bu" class="col-sm-2 col-form-label">Jumlah (Rp.)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputText" name="jumlah_bu" placeholder="Contoh 150000 tanpa titik dan koma">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="/bukuupah" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
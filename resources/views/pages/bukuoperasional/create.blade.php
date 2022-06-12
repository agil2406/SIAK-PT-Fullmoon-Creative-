@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon

@section('content')

<div class="pagetitle">
    <h1>Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/bukuoperasional') }}">Home</a></li>
            <li class="breadcrumb-item">Buku Operasional</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buku Opersional</h5>

        <!-- Horizontal Form -->
        <form action="/bukuoperasional/save" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="uraian_bo" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="uraian_bo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_bo" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal_bo">
                </div>
                <label for="volume_bo" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume_bo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan_bo" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan_bo">
                </div>
                <label for="noBukti_bo" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="noBukti_bo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jumlah_bo" class="col-sm-2 col-form-label">Jumlah (Rp.)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputText" name="jumlah_bo" placeholder="Contoh 150000 tanpa titik dan koma">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="/bukuoperasional" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
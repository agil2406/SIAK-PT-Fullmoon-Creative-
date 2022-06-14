@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon

@section('content')

<div class="pagetitle">
    <h1>Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/bukukas') }}">Home</a></li>
            <li class="breadcrumb-item">Buku Kas</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buku Kas</h5>

        <!-- Horizontal Form -->
        <form action="/bukukas/save" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="uraian_bk" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="uraian_bk">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_bk" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal_bk">
                </div>
                <label for="volume_bk" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume_bk">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan_bk" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan_bk">
                </div>
                <label for="noBukti_bk" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="noBukti_bk">
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                            <option selected>Pilih Jenis Kas</option>

                            <option value=" <?php $a = "penerimaan_bk"; ?>">Penerimaan</option>
                            <option value="<?php $a = "pengeluaran_bk"; ?>">Pengeluaran</option>

                        </select>
                        <label for="floatingSelectGrid">Jenis Kas</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGrid" placeholder="150000" name="{{$a}}">
                        <label for="floatingInputGrid">Jumlah Uang</label>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="/bukukas" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
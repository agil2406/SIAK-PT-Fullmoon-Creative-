@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon

@section('content')

<div class="pagetitle">
    <h1>Ubah Data</h1>
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
        <form action="/bukukas/{{$bukukas->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row mb-3">
                <label for="uraian_bk" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="uraian_bk" value="{{$bukukas->uraian_bk}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_bk" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal_bk" value="{{$bukukas->tanggal_bk}}">
                </div>
                <label for="volume_bk" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume_bk" value="{{$bukukas->volume_bk}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan_bk" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan_bk" value="{{$bukukas->satuan_bk}}">
                </div>
                <label for="noBukti_bk" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="noBukti_bk" value="{{$bukukas->noBukti_bk}}">
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                            <option selected>Pilih Jenis Kas</option>

                            <option value=" <?php $a = "penerimaan_bk"; ?>" @if ($bukukas->penerimaan_bk > 0) selected <?php $b = "penerimaan_bk"; ?> @endif >Penerimaan</option>
                            <option value="<?php $a = "pengeluaran_bk"; ?>" @if ($bukukas->pengeluaran_bk > 0) selected <?php $b = "pengeluaran_bk"; ?> @endif >Pengeluaran</option>

                        </select>
                        <label for="floatingSelectGrid">Jenis Kas</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGrid" placeholder="150000" name="{{$b}}" @if ($b=="penerimaan_bk" ) value="{{$bukukas->penerimaan_bk}}" @else value="{{$bukukas->pengeluaran_bk}}" @endif>
                        <label for="floatingInputGrid">Jumlah Uang</label>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary" value="update">Simpan Data</button>
                <a href="/bukukas" class="btn btn-secondary" type="reset">Batal</a>
                <form action="/bukukas/{{$bukukas->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-block" type="submit" value="Delete">Hapus</button>
                </form>
            </div>

        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
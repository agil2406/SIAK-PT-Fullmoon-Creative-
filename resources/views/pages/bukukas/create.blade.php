@extends('layouts.app')

@section('title')
Tambah Data Buku Kas

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
        <form action="/bukukas/save" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('uraian') is-invalid  @enderror" id="inputText" name="uraian" required autofocus value="{{ old('uraian')}}">
                    @error('uraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" value="{{ old('tanggal')}}">
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume" value="{{ old('volume')}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan" value="{{ old('satuan')}}">
                </div>
                <label for="noBukti" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('noBukti') is-invalid  @enderror" id="inputText" name="noBukti" value="{{ old('noBukti')}}">
                    @error('noBukti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <select name="jenisKas" class="form-select " id="floatingSelectGrid" aria-label="Floating label select example">
                            <option class="@error('jenisKas') is-invalid  @enderror">Pilih Jenis Buku</option>

                            <option value="bukuaset">Buku Aset</option>
                            <option value="bukumaterial">Buku Material</option>
                            <option value="bukuoperasional">Buku Operasional</option>
                            <option value="bukuupah">Buku Upah</option>
                        </select>
                        <label for="floatingSelectGrid">Jenis Buku</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="penerimaan" class="col-sm-2 col-form-label">Penerimaan</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="penerimaan" value="{{ old('penerimaan')}}">
                </div>
                <label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="pengeluaran" value="{{ old('pengeluaran')}}">
                </div>
            </div>


            <div class="row mt-3">
                <label for="image" class="col-sm-2 col-form-label">Bukti Kwitansi</label>
                <div class="col-sm-10">
                    <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" accept="image/*">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
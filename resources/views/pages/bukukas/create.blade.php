@extends('layouts.app')

@section('title')
Tambah Data Buku Kas
@endsection

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
        <form action="{{url('/bukukas/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
                <div class="col-sm-12">
                    <label for="proyek_id" class="col-sm-2 col-form-label">Proyek</label>
                    <select class="form-select" aria-label="Default select example" name="proyek_id">
                        <option class="@error('proyek_id') is-invalid  @enderror">Pilih Proyek</option>
                        @foreach ($proyek as $m)
                        <option value="{{$m->id}}">{{$m->nama_proyek}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="uraian" value="{{ old('uraian')}}">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example" name="master_id">
                        <option class="col-sm-2">Pilih Barang</option>
                        @foreach ($uraian as $m)
                        <option value="{{$m->id}}">{{$m->barang}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="harga" class="col-sm-2 col-form-label">Harga Satuan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga')}}" onkeyup="sum();">
                    </div>
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
                    <input type="number" class="form-control" id="volume" name="volume" value="{{ old('volume')}}" onkeyup="sum();">
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
            <div class="row mb-3">
                <label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="pengeluaran" id="pengeluaran" onkeyup="sum();" value="" readonly>
                    </div>
                </div>
                <label for="image" class="col-sm-2 col-form-label">Bukti Kwitansi</label>
                <div class="col-sm-4">
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
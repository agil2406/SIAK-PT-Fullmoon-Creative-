@extends('layouts.app')

@section('title')
Tambah Data Buku Kas

@section('content')

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
        <h5 class="card-title">Tambah Proyek</h5>

        <!-- Horizontal Form -->
        <form action="{{url('proyek/save')}}" method="POST">
            @csrf
            <div class="row mb-3 mt-3">
                <label for="nama_proyek" class="col-sm-2 col-form-label">Nama Proyek</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_proyek') is-invalid  @enderror" id="inputText" name="nama_proyek" required autofocus value="{{ old('nama_proyek')}}">
                    @error('nama_proyek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat_proyek" class="col-sm-2 col-form-label">Alamat Proyek</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('alamat_proyek') is-invalid  @enderror" placeholder="Jl. Sunan kali jaga 2 " id="floatingTextarea" style="height: 100px;" name="alamat_proyek"></textarea>
                    @error('alamat_proyek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <label for="tgl_awalproyek" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tgl_awalproyek" value="{{ old('tgl_awalproyek')}}">
                </div>
                <label for="tgl_akhirproyek" class="col-sm-2 col-form-label">Tanggal Berakhir</label>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tgl_akhirproyek" value="{{ old('tgl_akhirproyek')}}">
                </div>
            </div>
            <div class="row mt-3">
                <label for="rab_proyek" class="col-sm-2 col-form-label">RAB Proyek</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="rab_proyek" value="{{ old('rab_proyek')}}">
                </div>
            </div>


            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="{{url('/proyek')}}" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->
    </div>
</div>
@endsection
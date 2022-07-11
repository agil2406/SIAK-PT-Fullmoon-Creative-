@extends('layouts.app')

@section('title')
Tambah Data Progres
@endsection
@section('content')

<div class="pagetitle">
    <h1>Tambah Progress</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Tambah Progress</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Progress Proyek</h5>

        <!-- Horizontal Form -->
        <form action="{{url('progres').'/'.$proyek->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row mb-3 mt-3">
                <label for="nama_proyek" class="col-sm-2 col-form-label">Nama Proyek</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_proyek') is-invalid  @enderror" id="inputText" name="nama_proyek" value="{{ $proyek->nama_proyek}}" readonly>
                    @error('nama_proyek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <label for="rab_proyek" class="col-sm-2 col-form-label">RAB Proyek</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('rab_proyek') is-invalid  @enderror" id="inputNumber" name="rab_proyek" value="{{ $proyek->rab_proyek}}" readonly>
                    @error('rab_proyek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="progres_proyek" class="col-sm-2 col-form-label">Progress Proyek</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="number" class="form-control @error('progres_proyek') is-invalid  @enderror" id="inputNumber" name="progres_proyek">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('progres_proyek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Simpan Progress</button>
                <a href="{{url('/cariprogres')}}" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->
    </div>
</div>
@endsection
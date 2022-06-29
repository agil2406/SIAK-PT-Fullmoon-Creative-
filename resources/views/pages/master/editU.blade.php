@extends('layouts.app')

@section('title')
Edit Data Master Buku Upah
@endsection

@section('content')

<div class="pagetitle">
    <h1>Detail Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Master</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Master</h5>

        <div class="container">
            <form action="{{url('masterU').'/'.$master->id}}" method="POST">
                @method('put')
                @csrf
                <label for="uraian" class="col-sm-2 col-form-label ml-auto">Uraian</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('uraian') is-invalid  @enderror" id="inputText" name="uraian" value="{{ $master->uraian}}">
                    @error('uraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="kode_uraian" class="col-sm-2 col-form-label ml-auto">Kode</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('kode_uraian') is-invalid  @enderror" id="inputText" name="kode_uraian" required value="{{ $master->kode_uraian}}" readonly>
                    @error('kode_uraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="sampai" class="col-sm-2 col-form-label">Jenis Kas</label>
                <div class="form">
                    <select class="form-select" aria-label="Default select example" name="jenisKas">
                        <option class="@error('jenisKas') is-invalid  @enderror">Pilih Jenis Kas</option>

                        <option value="bukuaset">Aset</option>
                        <option value="bukumaterial">Material</option>
                        <option value="bukuoperasional">Operasional</option>
                        <option value="bukuupah" selected>Upah</option>
                    </select>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{url('dmbukuupah')}}" class="btn btn-secondary" type="reset">Kembali</a>
                </div>
            </form>


        </div>

    </div>
</div>
@endsection
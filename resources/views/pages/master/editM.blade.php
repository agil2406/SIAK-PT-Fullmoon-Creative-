@extends('layouts.app')

@section('title')
Edit Data Master Buku Material
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
            <form action="{{url('masterM').'/'.$master->id}}" method="POST">
                @method('put')
                @csrf
                <label for="barang" class="col-sm-4 col-form-label ml-auto">Nama Barang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('barang') is-invalid  @enderror" id="inputText" name="barang" value="{{ $master->barang}}">
                    @error('barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="kode_barang" class="col-sm-2 col-form-label ml-auto">Kode</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('kode_barang') is-invalid  @enderror" id="inputText" name="kode_barang" required value="{{ $master->kode_barang}}" readonly>
                    @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="sampai" class="col-sm-2 col-form-label">Jenis Kas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('jenisKas') is-invalid  @enderror" id="inputText" name="jenisKas" required value="{{$master->jenisKas}}" readonly>
                </div>
                <div class="row g-2">
                    <div class="col-sm-10 mb-2">
                        <label for="jenismaterial" class="col-sm-4 col-form-label">Jenis Material</label>
                        <select class="form-select" aria-label="Default select example" name="jenismaterial">
                            <option class="col-sm-6 @error('jenismaterial') is-invalid  @enderror">Pilih Jenis</option>
                            <option value="Material Alam" @if ($master->jenismaterial == 'Material Alam') selected @endif>Material Alam</option>
                            <option value="Material Pabrik" @if ($master->jenismaterial == 'Material Pabrik') selected @endif>Material Pabrik</option>
                            <option value="MEP" @if ($master->jenismaterial == 'MEP') selected @endif>MEP</option>
                        </select>
                        @error('jenismaterial')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{url('/dmbukumaterial')}}" class="btn btn-primary" type="reset">Kembali</a>
                </div>
            </form>


        </div>

    </div>
</div>
@endsection
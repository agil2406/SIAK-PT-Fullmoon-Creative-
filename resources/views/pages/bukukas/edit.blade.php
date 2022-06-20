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
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buku Kas</h5>

        <!-- Horizontal Form -->
        <form action="/bukukas/{{$bukukas->id}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row mb-3">
                <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('uraian') is-invalid  @enderror" id="inputText" name="uraian" value="{{$bukukas->uraian}}">
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
                    <input type="date" class="form-control  @error('tanggal') is-invalid  @enderror" name="tanggal" value="{{$bukukas->tanggal}}">
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputText" name="volume" value="{{$bukukas->volume}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputText" name="satuan" value="{{$bukukas->satuan}}">
                </div>
                <label for="noBukti" class="col-sm-2 col-form-label">No Bukti</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('noBukti') is-invalid  @enderror" id="inputText" name="noBukti" value="{{$bukukas->noBukti}}">
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
                        <select name="jenisKas" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" value="{{$bukukas->jenisKas}}">
                            <option selected>Pilih Jenis Kas</option>

                            <option value="bukuaset " @if ($bukukas->jenisKas == "bukuaset") selected @endif > Buku Aset</option>
                            <option value="bukumaterial" @if ($bukukas->jenisKas == "bukumaterial") selected @endif>Buku Material</option>
                            <option value="bukuoperasional " @if ($bukukas->jenisKas == "bukuoperasional") selected @endif>Buku Operasional</option>
                            <option value="bukuupah" @if ($bukukas->jenisKas == "bukuupah") selected @endif>Buku Upah</option>
                        </select>
                        <label for="floatingSelectGrid">Jenis Kas</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="penerimaan" class="col-sm-2 col-form-label">Penerimaan</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="penerimaan" value="{{$bukukas->penerimaan}}">
                </div>
                <label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="pengeluaran" value="{{$bukukas->pengeluaran}}">
                </div>
            </div>
            @if (!$bukukas->image)
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
            @else
            <div class="row mt-3">
                <div class="col-sm-8" style="max-width: 200px;">
                    <img src="{{asset('/storage/'.$bukukas->image)}}" alt="kwitansi" class=" img-fluid mt-2">
                </div>
            </div>
            @endif
            <div class="row">

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary" value="update">Simpan Data</button>
                    <a href="/bukukas" class="btn btn-secondary" type="reset">Batal</a>
                </div>

            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection
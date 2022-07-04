@extends('layouts.app')

@section('title')
Pesan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Pesan Penolakan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Laporan Pengajuan</li>
            <li class="breadcrumb-item">Pesan Penolakan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">

        <h5 class="card-title">Kirim Pesan</h5>

        <!-- Horizontal Form -->
        <form action="{{url('pesan/save')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="pesan" class="col-sm-2 col-form-label">Pesan Penolakan</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('pesan') is-invalid  @enderror" placeholder="Pesan" id="floatingTextarea" style="height: 100px;" name="pesan"></textarea>
                    @error('pesan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <input type="number" class="form-control" name="rekap_id" value="{{$id}}" hidden>



            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                <a href="{{url('/laporan')}}" class="btn btn-secondary" type="reset">Batal</a>
            </div>
        </form><!-- End Horizontal Form -->
    </div>
</div>
@endsection
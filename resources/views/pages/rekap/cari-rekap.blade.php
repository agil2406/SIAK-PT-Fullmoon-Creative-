@extends('layouts.app')

@section('title')
Rekap Proyek
@endsection

@section('content')
<div class="pagetitle">
    <h1>Buku Rekap</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Buku Rekap</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card" style="width: 90%">
    <div class="card-body">

        <div class="container">
            <form action="{{url('buatrekap')}}" method="get">
                @csrf
                <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" name="dari" value="{{ old('dari')}}">
                </div>
                <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" name="sampai" value="{{ old('sampai')}}">
                </div>
                <div class=" mt-4">
                    <button class="btn btn-primary" type="submit">Buat Rekap</button>
                </div>
            </form>


        </div>
    </div>
</div>



@endsection
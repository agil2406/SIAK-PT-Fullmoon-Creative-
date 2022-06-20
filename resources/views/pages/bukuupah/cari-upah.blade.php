@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
    <h1>Buku Upah</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Buku Upah</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card" style="width: 90%">
    <div class="card-body">

        <div class="container">
            <form action="{{url('cariupah')}}" method="get">
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
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>


        </div>
    </div>
</div>



@endsection
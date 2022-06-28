@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
    <h1>Pilih Proyek</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Progres Proyek</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card" style="width: 90%">
    <div class="card-body">

        <div class="container">
            <form action="{{url('progres')}}" method="get">
                @csrf
                <label for="proyek_id" class="col-sm-2 col-form-label">Proyek</label>
                <select class="form-select" aria-label="Default select example" name="proyek_id">
                    <option class="@error('proyek_id') is-invalid  @enderror">Pilih Proyek</option>
                    @foreach ($proyek as $m)
                    <option value="{{$m->id}}">{{$m->nama_proyek}}</option>
                    @endforeach
                </select>
                <div class=" mt-4">
                    <button class="btn btn-primary" type="submit">Tambah Progress</button>
                </div>
            </form>


        </div>
    </div>
</div>



@endsection
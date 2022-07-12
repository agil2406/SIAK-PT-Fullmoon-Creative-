@extends('layouts.app')

@section('title')
Rekap Proyek
@endsection

@section('content')
@if(session()->has('message'))
      <div class="alert alert-succes alert-dismissible fade show" role="alert">
          {{session('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
        </button>
      </div>
    @endif
<form action="{{route('profileUpdate')}}" method="post">
    @method("put")
    @csrf

    <div class="row mb-3">
    <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
    <div class="col-md-8 col-lg-9">
        <input value="{{old('name', Auth::user()->name)}}" name="fullName" type="text" class="form-control" id="fullName">
    </div>
    </div>


    <div class="row mb-3">
    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
    <div class="col-md-8 col-lg-9">
        <input name="job" type="text" class="form-control" id="Job" value="{{old('name', Auth::user()->level)}}">
    </div>
    </div>

    <div class="row mb-3">
    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
    <div class="col-md-8 col-lg-9">
        <input name="email" type="email" class="form-control" id="Email" value="{{old('name', Auth::user()->email)}}">
    </div>
    </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>  
@endsection
   
  
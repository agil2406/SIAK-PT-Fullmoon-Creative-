@extends('layouts.app')

@section('title')
Tambah Data Master Buku aset
@endsection

@section('content')
<div class="pagetitle">
    <h1>Data Master</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Data Master</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="card">
    <div class="card-body">

        <div class="container">

            <h5 class="card-title">Data Master</h5>
            <!-- Extra Large Modal -->
            <!-- Basic Modal -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                Tambah Data
            </button>
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Horizontal Form -->

                        <div class="container">
                            <form action="{{url('master/saveA')}}" method="POST">
                                @csrf
                                <label for="barang" class="col-sm-4 col-form-label ml-auto">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('barang') is-invalid  @enderror" id="inputText" name="barang" required autofocus value="{{ old('barang')}}">
                                    @error('barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label for="kode_barang" class="col-sm-2 col-form-label ml-auto">Kode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('kode_barang') is-invalid  @enderror" id="inputText" name="kode_barang" required value="{{ 'AS/'.$kd}}" readonly>
                                    @error('kode_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <label for="sampai" class="col-sm-2 col-form-label">Jenis Kas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('jenisKas') is-invalid  @enderror" id="inputText" name="jenisKas" required value="bukuaset" readonly>
                                </div>
                                <div class=" modal-footer">
                                    <button class="btn btn-primary" type="submit">Tambah Data</button>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>





            <table id="datatables" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> NO </th>
                        <th> BARANG </th>
                        <th> KODE </th>
                        <th> AKSI </th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td> {{$d->barang}}</td>
                        <td> {{$d->kode_barang}}</td>
                        <td class="align-items-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-2">
                                    <a href="{{url('masterA').'/'.$d->id.'/edit'}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{url('master').'/'.$d->id.'/detail'}}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{url('masterA').'/'.$d->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus ?')"><i class="bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-2">

                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
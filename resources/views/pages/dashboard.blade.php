@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Pengeluaran <span>| Minggu Ini</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                </div>
                <div class="ps-3">
                  <h6>Rp.{{number_format($pengeluaran_minggu)}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-md-4">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Pengeluaran <span>| Bulan Ini</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa fa-arrow-up" aria-hidden="true"></i>

                </div>
                <div class="ps-3">
                  <h6>Rp.{{number_format($pengeluaran_bulan)}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-md-4">

          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Pengeluaran <span>| Tahun Ini</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6></h6>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Recent Sales -->

        @can('direksi')
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Sales <span>| Today</span></h5>

              <div class="container">

                <table id="datatables" class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        <div class="row justify-content-center">
                          NO
                        </div>
                      </th>
                      <th>
                        <div class="row justify-content-center">
                          TANGGAL
                        </div>
                      </th>
                      <th>
                        <div class="row justify-content-center">
                          STATUS
                        </div>
                      </th>
                      <th>
                        <div class="row justify-content-center">
                          TINDAKAN
                        </div>
                      </th>
                      <th>
                        <div class="row justify-content-center">
                          AKSI
                        </div>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $d )
                    <tr>
                      <td>
                        <div class="row justify-content-center">
                          {{$loop->iteration}}
                        </div>
                      </td>
                      <td>
                        <div class="row justify-content-center">
                          {{date('d M Y',strtotime($d->created_at))}}
                        </div>
                      </td>
                      @if ($d->status == 1 )
                      <td>
                        <div class="d-flex justify-content-center mt-2">
                          <span class="badge rounded-pill bg-warning text-dark fs-7">Sedang Proses</span>
                        </div>
                      </td>
                      @elseif ($d->status == 0)
                      <td>
                        <div class="d-flex justify-content-center mt-2">
                          <span class="badge rounded-pill bg-danger fs-7">Ditolak</span>
                        </div>
                      </td>
                      @else
                      <td>
                        <div class="d-flex justify-content-center mt-2">
                          <span class="badge rounded-pill bg-success fs-7">Diterima</span>
                        </div>
                      </td>
                      @endif
                      <td>
                        <div class="d-flex justify-content-center mt-2">
                          <div class="col-sm-4">
                            <a class="badge bg-success fs-7" href="{{url('rekap').'/'.$d->id.'/setuju'}}"> Setuju </a>
                          </div>
                          <div class="col-sm-4">
                            <a class="badge bg-danger " href="{{url('rekap').'/'.$d->id.'/tolak'}}"> Tolak </a>
                          </div>
                        </div>

                      </td>
                      <td class="align-items-center">
                        <div class="d-flex justify-content-center">
                          <div class="col-sm-4">
                            <a href="{{url('rekap').'/'.$d->id.'/detail'}}" class="btn btn-outline-warning"><i class="bi bi-info-circle"></i></a>
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
              @endcan

            </div>

          </div>
        </div><!-- End Recent Sales -->

        <!-- Top Selling -->

      </div>
    </div><!-- End Left side columns -->


  </div>
</section>
@endsection
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
                <h5 class="card-title">Pemasukan <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-md-4">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Pengeluaran <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa fa-arrow-up" aria-hidden="true"></i>
                   
                  </div>
                  <div class="ps-3">
                    <h6>$3,264</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-md-4">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Saldo <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <!-- <div class="col-12">
            <div class="card">

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
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <!-- <div id="reportsChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Sales',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script> -->
                <!-- End Line Chart -->
<!-- 
              </div>

            </div>
          </div --> 
         

          <!-- Recent Sales -->
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

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal pengajuan</th>
                      <th scope="col">Jenis Kas</th>
                      <th scope="col">Status</th>
                      <th scope="col">Detail</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>14 november 2021</td>
                      <td>Buku Aset</td>
                      <td><span class="badge bg-success">Approved</span></td>
                      <td>icon mata</td>
                      <td>icon hapus dollar</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">2</a></th>
                      <td>1 Agustu 2020</td>
                      <td>Buku Upah</td>
                      <td><span class="badge bg-warning">Pending</span></td>
                      <td>icon mata</td>
                      <td>icon hapus dll</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">3</a></th>
                      <td>29 mei 2021</td>
                      <td>Buku Aset</td>
                      <td><span class="badge bg-warning">Pending</span></td>
                      <td>icon mata</td>
                      <td>icon hapus dll</td>
                   </tr>
                   <tr>
                      <th scope="row"><a href="#">4</a></th>
                      <td>1 juli 2022</td>
                      <td>Buku operasional</td>
                      <td><span class="badge bg-danger">Rejected</span></td>
                      <td>icon mata</td>
                      <td>icon hapus dll</td>
                   </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->

        </div>
      </div><!-- End Left side columns -->
    

    </div>
  </section>
@endsection

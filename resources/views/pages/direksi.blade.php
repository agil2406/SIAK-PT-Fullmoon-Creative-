@extends('layouts.app')

@section('title')
Dashboard Admin Fullmoon
@endsection

@section('content')

<div class="pagetitle">
    <h1>Detail Proyek</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Proyek</a> </li>
            <li class="breadcrumb-item active">Detail Proyek</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row mt-3">
                <div class="col-md-12">
                    <h4> <b> Nama Proyek</b></h4>
                    <span class="right"> <b> RAB : 1.000.000.000</b></span>
                </div> 
            </div>
            <hr class="mb-4">

            <div class="row">
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
                </div>
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
                </div>
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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">On Progres</h5>
                        <!-- Bar Chart -->
                        <div id="barChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                                series: [{
                                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
                                }],
                                chart: {
                                type: 'bar',
                                height: 350
                                },
                                plotOptions: {
                                bar: {
                                    borderRadius: 4,
                                    horizontal: true,
                                }
                                },
                                dataLabels: {
                                enabled: false
                                },
                                xaxis: {
                                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                                    'United States', 'China', 'Germany'
                                ],
                                }
                            }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">  
                <div class="col-md-12">
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
                                        Uraian
                                    </div>
                                </th>
                                <th> 
                                    <div class="row justify-content-center">
                                        Volume
                                    </div>
                                </th>
                                <th> 
                                    <div class="row justify-content-center">
                                        Pengeluaran
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td> 
                                    <div class="row justify-content-center">
                                    
                                    </div>
                                </td>
                                <td> 
                                    <div class="row justify-content-center">
                                        
                                    </div> 
                                </td>
                                <td> 
                                    <div class="row justify-content-center">
                                    
                                    </div>
                                </td>
                                <td> 
                                    <div class="row justify-content-center">
                                        
                                    </div> 
                                </td>    
                            </tr> 
                        </tbody>
                        <th>Saldo</th>
                    </table>
                </div>      
            </div>
        </div>
    </div>
</div>


@endsection
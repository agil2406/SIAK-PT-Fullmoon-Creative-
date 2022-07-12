<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ url('frontend/assets/vendor/simple-datatables/login.css') }}" rel="stylesheet">
    <title>Download PDF</title>
</head>

<body>
    <div class="container">
        <img src="{{ url('frontend/assets/vendor/simple-datatables/image.jpg') }}" alt="logo" width="100px" class="rounded-circle">
        <div class="head pdf-text">
            <p class="mb"><b>Perusahaan Bangun Bale</b></p>
            <p class="small">jl.Gomong Sakura no/10 Mataram, Lombok Barat<br></p>
            <p class=""><b> 01023423414</b></p>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row center">
                <div class="col-md-12 pdf-text">
                    <h1>REKAP KEUANGAN BANGUN BALE</h1>
                    <h2 style="text-transform:uppercase;"> BULAN <span>{{strftime("%B %Y", strtotime($rekap->created_at))}}</span> </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="datatables" class="table table-striped table-hover table-bordered font-table">
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
                                        Jumlah (Rp.)
                                    </div>
                                </th>
                                <th>
                                    <div class="row justify-content-center">
                                        Total (Rp.)
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="row center">
                                        <b>A</b>
                                    </div>
                                </td>
                                <td>
                                    <b>Saldo Awal</b>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Saldo Kas Bulan Lalu</td>
                                <td>Rp.{{number_format($rekap->sk_bl,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Saldo Bank Bulan Lalu</td>
                                <td>Rp.{{number_format($rekap->sb_bl,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <center> Jumlah Saldo Awal </center>
                                </td>
                                <?php
                                $a = $rekap->sk_bl + $rekap->sb_bl;
                                ?>
                                <td></td>
                                <td>Rp.{{number_format($a,0)}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row center">
                                        <b>B</b>
                                    </div>
                                </td>
                                <td>
                                    <b>Pemasukan Bulan Ini</b>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. In Cash</td>
                                <td>Rp.{{number_format($rekap->in_cash,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Bunga Tabungan Bank</td>
                                <td>Rp.{{number_format($rekap->bunga_bnk,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c. Transfer Dana Dari KPPN</td>
                                <td>Rp.{{number_format($rekap->trf_kppn,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <center>Jumlah Pemasukan </center>
                                </td>
                                <td></td>
                                <?php
                                $b = $rekap->trf_kppn + $rekap->bunga_bnk + $rekap->in_cash;
                                ?>
                                <td>Rp.{{number_format($b,0)}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <center>Jumlah Saldo </center>
                                </td>
                                <td></td>
                                <?php
                                $o = $b + $a;
                                ?>
                                <td>Rp.{{number_format($o,0)}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row center">
                                        <b>C</b>
                                    </div>
                                </td>
                                <td>
                                    <b>Pengeluaran Bulan Ini</b>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Total Biaya Material</td>
                                <td>Rp.{{number_format($rekap->total_material,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Total Biaya Aset</td>
                                <td>Rp.{{number_format($rekap->total_aset,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c. Total Biaya Operasional</td>
                                <td>Rp.{{number_format($rekap->total_operasional,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>d. Total Biaya Upah</td>
                                <td>Rp.{{number_format($rekap->total_upah,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>e. PPH</td>
                                <td>Rp.{{number_format($rekap->pph,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>f. Administrasi Bank</td>
                                <td>Rp.{{number_format($rekap->admin_bank,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <center> Jumlah Pengeluaran </center>
                                </td>
                                <td></td>
                                <?php
                                $c = $rekap->total_aset + $rekap->total_material + $rekap->total_operasional + $rekap->total_upah + $rekap->pph + $rekap->admin_bank;
                                ?>
                                <td>Rp.{{number_format($c,0)}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row center">
                                        <b>D</b>
                                    </div>
                                </td>
                                <td>
                                    <b>Saldo Akhir</b>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Saldo Kas Bulan Ini</td>
                                <td>Rp.{{number_format($rekap->sk_bi,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Saldo Bank Bulan Ini</td>
                                <td>Rp.{{number_format($rekap->sb_bi,0)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row center">
                                        <b>E</b>
                                    </div>
                                </td>
                                <td>
                                    <b>Kontrol</b>
                                </td>
                                <?php
                                $q = ($rekap->sk_bi + $rekap->sb_bi);
                                $z = ($rekap->trf_kppn + $rekap->bunga_bnk + $rekap->in_cash + $rekap->sk_bl + $rekap->sb_bl) - ($rekap->total_aset + $rekap->total_material + $rekap->total_operasional + $rekap->total_upah + $rekap->pph + $rekap->admin_bank);
                                ?>
                                <td><b> Rp.{{number_format($q,0)}} </b></td>
                                <td><b> Rp.{{number_format($o-$c,0)}} </b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <p class="center"><b>Mataram, {{strftime("%d %B %Y", strtotime($rekap->created_at))}}</b></p>
            </div>
            <div class="row font-ttd mt-3">
                <div class="admin">
                    <p class="mb"><b>Diperiksa</b></p>
                    <p class=""><b>Admin</b><br></p>
                    <p class="mt-5 pt-5"><b> Agil Trieanto</b></p>
                </div>
                <div class="direksi">
                    <p class="mb"><b>Disetujui</b></p>
                    <p><b>Admin</b></p>
                    <p class="mt-5 pt-5"><b>Noor Alamsyah</b></p>
                </div>
                <div class="bendahara">
                    <p class="mb"><b>Dibuat Oleh</b></p>
                    <p><b>Bendahara KSM</b></p>
                    <p class="mt-5 pt-5"><b>Haidar Rahman</b></p>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
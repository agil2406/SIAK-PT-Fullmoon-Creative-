<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ url('frontend/assets/vendor/simple-datatables/login.css') }}" rel="stylesheet">
    <title>Data Rekap</title>
</head>

<body>
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h1>Data Rekap</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="datatables" class="table table-striped table-hover table-bordered font-table">
                    <thead>
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
                                URAIAN
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                VOLUME
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                SATUAN
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                PENERIMAAN
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                PENGELUARAN
                            </div>
                        </th>
                        <th>
                            <div class="row justify-content-center">
                                SALDO
                            </div>
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        $saldo = 0;
                        ?>
                        @foreach ($data as $d)
                        <tr>
                            <td style="text-align: center;">{{$loop->iteration}}</td>
                            <td style="text-align: center;">{{date('d M Y',strtotime($d->tanggal))}}</td>
                            <td style="text-align: center;">{{$d->uraian}}</td>
                            <td style="text-align: center;">{{number_format($d->volume,0)}}</td>
                            <td style="text-align: center;">{{$d->satuan}}</td>
                            <td style="text-align: center;"> Rp.{{number_format($d->penerimaan,0)}}</td>
                            <td style="text-align: center;"> Rp.{{number_format($d->pengeluaran,0)}}</td>
                            <?php
                            $saldo =  $saldo + ($d->penerimaan - $d->pengeluaran);
                            ?>
                            <td style="text-align: center;"> Rp.{{number_format($saldo,0)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="5" style="text-align: center; text-transform:uppercase;"><b> Jumlah </b></th>
                            <td style="text-align: center;"><b> Rp.{{number_format($total_penerimaan,0)}} </b></td>
                            <td style="text-align: center;"><b> Rp.{{number_format($total_pengeluaran,0)}} </b></td>
                            <td style="text-align: center;"><b> Rp.{{number_format($saldo,0)}} </b></td>
                        </tr>
                    </tbody>
                </table>
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
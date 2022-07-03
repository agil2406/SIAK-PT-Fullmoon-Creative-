<table border="1">
    <thead>
        <tr>
            <th colspan="8" style="text-align: center; font-size: 14px;">
                <b>
                    BUKU KAS UMUM
                </b>
            </th>
        </tr>
        <tr>
            <th colspan="8" style="text-align: center; font-size: 14px;">
                <div>
                    <b>
                        {{strftime("%B %Y", strtotime($tanggal))}}
                    </b>
                </div>
            </th>
        </tr>
        <tr>
            <th style="text-align: center;">NO</th>
            <th style="text-align: center;">TANGGAL</th>
            <th style="text-align: center;">URAIAN</th>
            <th style="text-align: center;">VOLUME</th>
            <th style="text-align: center;">SATUAN</th>
            <th style="text-align: center;">PENERIMAAN</th>
            <th style="text-align: center;">PENGELUARAN</th>
            <th style="text-align: center;">SALDO</th>
        </tr>
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
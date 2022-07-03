<table border="1">
    <thead>
        <tr>
            <th colspan="8" style="text-align: center; font-size: 14px;">
                <b>
                    BUKU MATERIAL
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
            <th style="text-align: center;">HARGA</th>
            <th style="text-align: center;">NO BUKTI</th>
            <th style="text-align: center;">JUMLAH</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td style="text-align: center;">{{$loop->iteration}}</td>
            <td style="text-align: center;">{{date('d M Y',strtotime($d->tanggal))}}</td>
            <td style="text-align: center;">{{$d->uraian}}</td>
            <td style="text-align: center;">{{number_format($d->volume,0)}}</td>
            <td style="text-align: center;">{{$d->satuan}}</td>
            <td style="text-align: center;"> Rp.{{number_format($d->harga,0)}}</td>
            <td style="text-align: center;">{{$d->noBukti}}</td>
            <td style="text-align: center;"> Rp.{{number_format($d->pengeluaran,0)}}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="7" style="text-align: center; text-transform:uppercase;"><b> Jumlah </b></th>
            <td style="text-align: center;"><b> Rp.{{number_format($total_material,0)}} </b></td>
        </tr>
    </tbody>
</table>
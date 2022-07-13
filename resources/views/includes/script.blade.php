<!-- Vendor JS Files -->
<script src="{{ url('frontend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ url('frontend/assets/js/main.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>







<!-- Datatables -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
        $('#datatabless').DataTable();
        $('#kas').dataTable({
            "bFilter": false
        });

    });
</script>
<script type="text/javascript">
    function sum() {
        var volume = document.getElementById('volume').value;
        var harga = document.getElementById('harga').value;
        var result = parseFloat(volume) * parseInt(harga);
        if (!isNaN(result)) {
            document.getElementById('pengeluaran').value = result;
        }
    }
</script>
<script type="text/javascript">
    function sum1() {
        var sk_bl = document.getElementById('sk_bl').value;
        var sb_bl = document.getElementById('sb_bl').value;
        var jml_saldo = parseInt(sk_bl) + parseInt(sb_bl);
        if (!isNaN(jml_saldo)) {
            document.getElementById('jml_saldo').value = jml_saldo;
        }
    }

    function sum2() {
        var cash = document.getElementById('in_cash').value;
        var trf = document.getElementById('trf_kppn').value;
        var bunga = document.getElementById('bunga_bnk').value;
        var jml_pemasukan = parseInt(cash) + parseInt(trf) + parseInt(bunga);
        if (!isNaN(jml_pemasukan)) {
            document.getElementById('jml_pemasukan').value = jml_pemasukan;
        }
    }

    function sum3() {
        var aset = document.getElementById('aset').value;
        var upah = document.getElementById('upah').value;
        var material = document.getElementById('material').value;
        var operasional = document.getElementById('operasional').value;
        var pph = document.getElementById('pph').value;
        var adm = document.getElementById('admn').value;
        var jml_pengeluaran = parseInt(aset) + parseInt(upah) + parseInt(material) + parseInt(operasional) + parseInt(pph) + parseInt(adm);
        if (!isNaN(jml_pengeluaran)) {
            document.getElementById('jml_pengeluaran').value = jml_pengeluaran;
        }
    }
</script>
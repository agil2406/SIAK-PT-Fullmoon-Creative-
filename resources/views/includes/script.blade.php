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

<!-- Datatables -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            search: {
                return: true,
            },
        });
    });
</script>
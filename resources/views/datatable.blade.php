@push('head')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush
@push('footer')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            language: {
                zeroRecords: 'Data belum di tambahkan', 
                // infoEmpty: 'Data tidak di temukan'
            }
        , });
    });

</script>
@endpush

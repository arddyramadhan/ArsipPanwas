@push('head')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="{{ asset('/assets/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/select2-bootstrap4/select2-bootstrap4.min.css') }}">
@endpush
@push('footer')
<script src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('.select2').select2();
    // });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder : 'Pilih beberapa..!!'
        })
    })

</script>
@endpush

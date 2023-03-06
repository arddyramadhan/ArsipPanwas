{{-- @push('h  --}}
@push('footer')
<script src="{{ asset('./dist/libs/tinymce/tinymce.min.js') }}" defer></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        tinyMCE.init({
            selector: '.mytextarea', 
            height: 200, 
            menubar: false, 
            statusbar: false, 
            lists_indent_on_tab: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor', 
                'searchreplace visualblocks code fullscreen', 
                'insertdatetime media table paste code help wordcount',
                'lists'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat', 
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; line-height: 1;}'





        });
    })
</script>
@endpush

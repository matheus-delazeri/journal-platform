@php
$language = Illuminate\Support\Facades\App::currentLocale();

@endphp

<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists image',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link image',
        height: '60vh',
        content_css: 'default',
        draggable_modal: true,
        automatic_uploads: true,
        images_upload_credentials: true,
        images_upload_url: '{{route('admin.image.upload').'?_token='.csrf_token()}}',
        file_picker_types: 'image',
        language_url: '{{ asset("js/tinymce/langs/$language.js") }}',
        language: '{{ $language }}'
    });
</script>

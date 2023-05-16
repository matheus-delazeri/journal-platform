<!doctype html>
@php
    $prefix = "admin.";
    $menu = $menu ?? true;
    $footer = $footer ?? true;
@endphp
<html lang="pt-br">

@include($prefix.'block.head')

<body>

@include($prefix.'block.messages')
<div class="container h-100 mw-100">

    <div id="main" class="row h-100 align-items-center">

        @if($menu)
            @include($prefix.'block.menu')
            <div class="content col-md-10 col-sm-12 h-100 py-4" style="overflow-y: auto">
                <div class="mw-100 p-4">
                    @yield('content')
                </div>
            </div>
        @else
            <div class="content col-md-12">
                @yield('content')
            </div>
        @endif

    </div>

    @if($footer)
        <footer class="row">

            @include($prefix.'block.footer')

        </footer>
    @endif

</div>
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
    });
</script>

</body>
</html>

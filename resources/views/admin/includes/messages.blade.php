<div class="my-3 position-fixed d-flex flex-column align-items-center w-100">
    @foreach($errors->all() as $error)
        <span class="alert alert-danger w-50 mb-1">{{ $error }}</span>
    @endforeach

    @if(Session::has('success'))
        <span class="alert alert-success w-50">{{ Session::get('success')  }}</span>
    @endif
</div>

<script type="module">
    $('.alert').delay(2000).fadeOut()
</script>

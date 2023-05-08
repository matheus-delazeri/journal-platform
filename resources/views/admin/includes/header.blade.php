@foreach($errors->all() as $error)
    <span class="alert alert-danger">{{ $error }}</span>
@endforeach

@if(session()->has('success'))
    <span class="alert alert-success">{{ session()->get('success')  }}</span>
@endif

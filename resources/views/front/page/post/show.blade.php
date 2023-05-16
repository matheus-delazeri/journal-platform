@extends('front.layout.default')

@section('content')
    <div class="container">
        <h2 class="modal-title"><b>{{ $post->title }}</b></h2>
        <div class="post-content">
            {!! $post->content !!}
        </div>
    </div>
@stop


@extends('front.layout.default')
@section('meta_title', $post->title)
@section('meta_description', $post->meta_description ?? $post->title)
@section('meta_keywords', $post->meta_keywords ?? str_replace(" ", ", ", strtolower($post->title)))

@section('content')
    <div class="container post">
        <h1 class="modal-title mt-5"><b>{{ $post->title }}</b></h1>
        <p>{{ __("Event date") }}: <span class="badge bg-dark">{{ date('d/m/Y', strtotime($post->date)) }}</span></p>
        <hr>
        <div class="post-content mt-5">
            {!! $post->content !!}
        </div>
    </div>
@stop


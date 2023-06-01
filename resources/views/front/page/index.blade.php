@extends('front.layout.default')

@section('content')
    <div class="card-group">
        @foreach(\App\Models\Post::all() as $post)
            <div class="card p-5">
                <a href="{{ route('front.post.show', array('id' => $post->id)) }}">
                <img class="card-img-top w-100" src="{{ $post->image }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text"><small class="text-muted">{{ $post->date }}</small></p>
                </div>
                </a>
            </div>
        @endforeach
    </div>
@stop

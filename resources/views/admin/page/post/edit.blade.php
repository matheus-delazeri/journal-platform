@extends('admin.layout.default')

@section('content')
    <div class="mb-5">
        <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Post #" . $post->id)}}</h2>
        <p class="text-comment"><i class="fa fa-chevron-right"></i>Edição de posts</p>

        {{ Form::model($post, ['route' => ['admin.post.update', $post->id], 'method' => 'PUT']) }}
        {{ Form::submit('Salvar',['class' => 'btn btn-primary float-end mb-3']) }}
        <br/>
        {{ Form::label('title', 'Título', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control mb-3']) }}
        {{ Form::label('content', 'Conteúdo', ['class' => 'form-label']) }}
        {{ Form::textarea('content') }}
        {{ Form::close() }}
    </div>
@stop

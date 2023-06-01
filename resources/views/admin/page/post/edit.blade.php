@extends('admin.layout.default')

@section('content')
    <div class="mb-5">
        <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Post #" . $post->id)}}</h2>
        <p class="text-comment"><i class="fa fa-chevron-right"></i>Edição de posts</p>

        {{ Form::model($post, ['route' => ['admin.post.update', $post->id], 'method' => 'PUT']) }}
        <button type="submit" class="btn btn-primary float-end mb-3"><i class="fa fa-save"></i> Salvar</button>
        <br/>
        {{ Form::label('title', 'Título', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control mb-3']) }}
        {{ Form::label('date', 'Data', ['class' => 'form-label']) }}
        {{ Form::date('date', null, ['class' => 'form-control mb-3 w-25']) }}
        {{ Form::label('image', 'Image', ['class' => 'form-label']) }}
        {{ Form::text('image', null, ['class' => 'form-control mb-3']) }}
        {{ Form::label('content', 'Conteúdo', ['class' => 'form-label']) }}
        {{ Form::textarea('content') }}
        {{ Form::close() }}
    </div>
@stop

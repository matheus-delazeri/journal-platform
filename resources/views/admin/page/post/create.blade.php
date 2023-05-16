@extends('admin.layout.default')

@section('content')
    <div class="mb-5">
        <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Posts") }}</h2>
        <p class="text-comment"><i class="fa fa-chevron-right"></i>Criação de novos posts</p>

        {{ Form::open(['route' => 'admin.post.store']) }}
        {{ Form::label('title', 'Título', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control mb-3']) }}
        {{ Form::label('content', 'Conteúdo', ['class' => 'form-label']) }}
        {{ Form::textarea('content', null, ['class' => 'ck-editor']) }}
        {{ Form::submit('Salvar',['class' => 'btn btn-primary mt-3']) }}
    </div>
@stop

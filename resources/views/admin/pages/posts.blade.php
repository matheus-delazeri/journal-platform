@php use App\Models\Post; @endphp
@extends('admin.layouts.default')

@section('content')
    <div class="mb-5">
        <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Posts") }}</h2>
        <p class="text-comment"><i class="fa fa-chevron-right"></i>Gerenciamento de posts</p>
    </div>
    @include('admin.includes.grid', ['model' => new Post, 'columns' => ['id', 'title', 'content']])
@stop

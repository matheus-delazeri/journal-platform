@php use App\Models\Timeline; @endphp
@extends('admin.layout.default')

@section('content')
    <div class="mb-5">
        <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Timelines") }}</h2>
        <p class="text-comment"><i class="fa fa-chevron-right"></i>{{__("Timeline's managment")}}</p>
    </div>
    @include('admin.block.grid', ['model' => new Timeline, 'columns' => ['id', 'title', 'created_at', 'updated_at']])
@stop

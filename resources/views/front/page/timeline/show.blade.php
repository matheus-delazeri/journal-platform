@extends('front.layout.default')

@section('content')
    @include('front.block.timeline', ['timeline' => $timeline, 'detailed' => true])
@stop

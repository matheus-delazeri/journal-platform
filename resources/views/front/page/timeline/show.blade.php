@extends('front.layout.default')

@section('content')
    <div class="container">
        @include('front.block.timeline', ['timeline' => $timeline, 'detailed' => true])
    </div>
@stop

@php
    use App\Models\Timeline;
    $latestTimeline = Timeline::where('state', '=', Timeline::STATE_VISIBLE)
        ->latest()
        ->limit(1)
        ->get()
        ->first();
@endphp

@extends('front.layout.default')

@section('content')
    @if ($latestTimeline instanceof Timeline)
        @include('front.block.timeline', ['timeline' => $latestTimeline])
    @endif
@stop

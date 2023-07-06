@php
    use App\Models\Timeline;
@endphp


@if (isset($timeline) && $timeline instanceof Timeline)
    @php $timelinePosts = $timeline->getPublishedPosts();
    @endphp
    <div class="container timeline">
        <h2 class="modal-title mt-5" style="text-transform: uppercase"><b>{{ $timeline->title }}</b></h2> <span
            class="badge mb-3" style="background-color: {{$timeline->color}}">
        {{ $timeline->getPeriod() }}
    </span>
        @isset($detailed)
            @if($detailed)
                {!! $timeline->description !!}
            @endif
        @endisset
        <hr>
        @include("block.post.slider", ["posts" => $timelinePosts, "color" => $timeline->color])
    </div>
@endif

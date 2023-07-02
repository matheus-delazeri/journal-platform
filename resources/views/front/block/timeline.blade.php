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
        <div class="owl-carousel owl-theme h-75">
            <div class="card item h-100 p-1 text-light">
                <a href="{{ route('front.timeline.show', ['id' => $timeline->id]) }}"
                   class="d-block h-100 w-100 position-absolute"></a>
                <div class="card-body flex-column h-40" style="background-color: {{$timeline->color}}">
                    <h3 class="card-title bold h-25">{{ $timeline->title }}</h3>
                    <p>({{ $timeline->getPeriod() }})</p>
                    <hr class="p-0 "/>
                    <h4 class="card-text h-75">{{ $timeline->short_description }}</h4>
                </div>
            </div>
            @foreach($timelinePosts as $post)
                <div class="card item h-100 p-1">
                    <a href="{{ route('front.post.show', ['url_key' => $post->url_key]) }}"
                       class="d-block h-100 w-100 position-absolute"></a>
                    @if($post->image)
                        <span class="badge position-absolute my-2 mx-2"
                              style="background-color: {{$timeline->color}}">{{ date("d/m/Y", strtotime($post->date)) }}</span>
                        <img class="card-img-top h-60" src="{{ $post->image }}" alt="Card image cap">
                        <div class="card-body flex-column h-40 bg-light">
                            <h5 class="card-title h-40"><b>{{ $post->title }}</b></h5>
                            <p class="card-text h-60">{{ $post->short_content }}</p>
                        </div>
                    @else
                        <div class="card-body flex-column h-40 text-light"
                             style="background-color: {{$timeline->color}}">
                            <h3 class="card-title bold h-25">{{ $post->title }}</h3>
                            <span class="badge"
                                  style="background-color: {{$timeline->color}}">{{ date("d/m/Y", strtotime($post->date)) }}</span>
                            <hr class="p-0 "/>
                            <h4 class="card-text h-75">{{ $post->short_content }}</h4>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif

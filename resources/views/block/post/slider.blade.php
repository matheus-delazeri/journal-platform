@isset($posts)
    @php
        $posts = !isset($limit) ? $posts : $posts->slice(0, $limit);
    @endphp
    <div class="owl-carousel owl-theme h-75">
        @foreach($posts as $post)
            <div class="card item h-100 p-1">
                @if(isset($isAdmin) && $isAdmin)
                    <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                       class="d-block h-100 w-100 position-absolute"></a>
                @else
                    <a href="{{ route('front.post.show', ['url_key' => $post->url_key]) }}"
                       class="d-block h-100 w-100 position-absolute"></a>
                @endif

                @if($post->image)
                    <span class="badge bg-primary position-absolute my-2 mx-2" style="background-color: @isset($color) {{$color}}!important;@endisset">{{ date("d/m/Y", strtotime($post->date)) }}</span>
                    <img class="card-img-top h-60" src="{{ $post->image }}" alt="Card image cap">
                    <div class="card-body flex-column h-40 bg-light">
                        <h5 class="card-title h-40"><b>{{ $post->title }}</b></h5>
                        <p class="card-text h-60">{{ $post->short_content }}</p>
                    </div>
                @else
                    <div class="card-body flex-column h-40 text-light bg-primary" style="background-color: @isset($color) {{$color}}!important;@endisset">
                        <h3 class="card-title bold h-25">{{ $post->title }}</h3>
                        <span class="badge bg-primary" style="background-color: @isset($color) {{$color}}!important;@endisset">{{ date("d/m/Y", strtotime($post->date)) }}</span>
                        <hr class="p-0 "/>
                        <h4 class="card-text h-75">{{ $post->short_content }}</h4>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endisset

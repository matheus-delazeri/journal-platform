@php
   use App\Models\Timeline;
   $visibleTimelines = Timeline::where('state', '=', Timeline::STATE_VISIBLE)->get();

@endphp
<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center position-fixed w-100 start-0 shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand w-25 me-auto"><i class="fa fa-newspaper"></i>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#responsiveMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="responsiveMenu">
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="timelinesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Timelines </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="timelinesDropdown">
                        @foreach($visibleTimelines as $timeline)
                            <li><a class="dropdown-item small text-wrap" href="{{route("front.timeline.show", ["url_key" => $timeline->url_key])}}">{{$timeline->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

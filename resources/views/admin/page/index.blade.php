@extends('admin.layout.default')


@section('content')

    @php
        $_userNewestPosts = \App\Models\Post::where("author_id","=",Auth::user()->id)
            ->get()
            ->sortByDesc("id");
        $_generalNewReleases = \App\Models\Post::paginate(10)->sortByDesc("id");
    @endphp
    <h2 class="page-title mb-5"><i class="fa fa-home"></i>{{ __("Welcome back") }}, <b>{{ Auth::user()->user }}</b></h2>
    @if($_userNewestPosts)
        <h5><i class="fa fa-chevron-right"></i>{{ __("Edit your newest posts") }}</h5>
        @include("block.post.slider", ["posts" => $_userNewestPosts, "isAdmin" => 1, "limit" => 5])
    @endif
    <br>
    @if($_generalNewReleases)
        <h5><i class="fa fa-chevron-right"></i>{{ __("Check out new posts") }}</h5>
        @include("block.post.slider", ["posts" => $_generalNewReleases, "limit" => 5])
    @endif

@stop

<!doctype html>
@php
    $prefix = "admin.";
    $menu = $menu ?? true;
    $footer = $footer ?? true;
@endphp
<html>

<head>

    @include($prefix.'includes.head')

</head>

<body>

@include($prefix.'includes.messages')
<div class="container h-100 mw-100">

    <div id="main" class="row h-100 align-items-center">

        @if($menu)
            <div class="menu col-md-2 h-100 p-0 shadow">
                @include($prefix.'includes.menu')
            </div>
            <div class="content col-md-10 h-100">
                @yield('content')
            </div>
        @else
            <div class="content col-md-12">
                @yield('content')
            </div>
        @endif

    </div>

    @if($footer)
        <footer class="row">

            @include($prefix.'includes.footer')

        </footer>
    @endif

</div>

</body>

</html>

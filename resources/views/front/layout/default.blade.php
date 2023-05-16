<!doctype html>
@php
    $prefix = "front.";
    $menu = $menu ?? true;
    $footer = $footer ?? true;
@endphp
<html lang="pt-br">

@include($prefix.'block.head')

<body>

<div class="container h-100 mw-100">

    <div id="main" class="row h-100 align-items-center">

        <div class="content col-md-12">
            @yield('content')
        </div>

    </div>

    @if($footer)
        <footer class="row">

            @include($prefix.'block.footer')

        </footer>
    @endif

</div>

</body>
</html>

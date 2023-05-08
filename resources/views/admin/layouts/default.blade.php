<!doctype html>
@php $prefix = "admin." @endphp
<html>

<head>

    @include($prefix.'includes.head')

</head>

<body>

<div class="container">

    <header class="row">

        @include($prefix.'includes.header')

    </header>

    <div id="main" class="row">

        @yield('content')

    </div>

    <footer class="row">

        @include($prefix.'includes.footer')

    </footer>

</div>

</body>

</html>

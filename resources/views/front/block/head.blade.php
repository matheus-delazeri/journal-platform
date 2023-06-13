<head>
    <meta charset="utf-8">

    <meta name="description" content="">

    <meta name="{{ config('app.name') }}" content="Blade">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta_title', config('app.name'))</title>
    <meta name="keywords" content="@yield('meta_keywords', config('app.name'))">
    <meta name="description" content="@yield('meta_description', config('app.name'))">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

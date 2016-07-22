<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>{{ isset($title) ? $title . ' - ' . env('SITE_TITLE') :  env('SITE_TITLE') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#40923F">
    <meta name="theme-color" content="#ffffff">
    <!-- Additional Styles -->
    @yield('styles')


</head>

<body>
<div id="page-wrapper">

    <div id="page-header">
        @include('partials.header')
    </div>

    <div id="page-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('partials.footer')

    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
    @yield('scripts')

    {{-- Toastr --}}
    {!! Toastr::render() !!}


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</div>
</body>
</html>
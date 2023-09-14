<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',env('APP_NAME'))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('adminassets/assets/img/brand/favicon.png') }}" type="image/x-icon">

	<!-- Icons css -->
	<link href="{{ asset('adminassets/assets/css/icons.css') }}" rel="stylesheet">

	<!-- Bootstrap css -->
	<link id="style" href="{{ asset('adminassets/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- style css -->
	<link href="{{ asset('adminassets/assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('adminassets/assets/css/plugins.css') }}" rel="stylesheet">

	<!--- Animations css-->
	<link href="{{ asset('adminassets/assets/css/animate.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">


        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('adminassets/assets/plugins/jquery/jquery.min.js') }}"></script>

	<!-- Bootstrap Bundle js -->
	<script src="{{ asset('adminassets/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('adminassets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- Moment js -->
	<script src="{{ asset('adminassets/assets/plugins/moment/moment.js') }}"></script>

	<!-- P-scroll js -->
	<script src="{{ asset('adminassets/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

	<!-- eva-icons js -->
	<script src="{{ asset('adminassets/assets/js/eva-icons.min.js') }}"></script>

	<!--themecolor js-->
	<script src="{{ asset('adminassets/assets/js/themecolor.js') }}"></script>

	<!-- custom js -->
	<script src="{{ asset('adminassets/assets/js/custom.js') }}"></script>

	<!-- switcher-styles js -->
	<script src="{{ asset('adminassets/assets/js/swither-styles.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-seo />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/industrio/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/industrio/lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/industrio/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/industrio/css/industrio-base.css') }}">
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>
<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('vendor/industrio/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/industrio/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('vendor/industrio/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/industrio/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/industrio/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

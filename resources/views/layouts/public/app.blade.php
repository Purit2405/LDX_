<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="@yield('description', 'LDX Elevator - Professional elevator solutions, installation, modernization, maintenance and repair.')">

    <meta name="robots"
          content="index, follow">

    <title>
        @yield('title', 'LDX Elevator')
    </title>

    @vite([
    'resources/css/public.css',
    'resources/js/public.js'
    ])

    @stack('styles')
</head>

<body>

    {{-- ================================================================
         PUBLIC NAVBAR
         ================================================================ --}}
    @include('layouts.public.navbar')


    {{-- ================================================================
         MAIN CONTENT
         ================================================================ --}}
    <main class="ldx-public-main">
        @yield('content')
    </main>


    {{-- ================================================================
         PUBLIC FOOTER
         ================================================================ --}}
    @include('layouts.public.footer')


    @stack('scripts')

</body>
</html>
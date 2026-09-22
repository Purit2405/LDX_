<!DOCTYPE html>
<html lang="th">
<style>
@import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap');
</style>
<head>

    {{-- ================================================================
         BASIC META
         ================================================================ --}}

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- ================================================================
         SEO DESCRIPTION
         ================================================================ --}}

    <meta
        name="description"
        content="@yield(
            'description',
            'LDX Elevator - Professional elevator solutions, installation, modernization, maintenance and repair.'
        )"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    {{-- ================================================================
         TITLE
         ================================================================ --}}

    <title>
        @yield('title', 'LDX Elevator')
    </title>


    {{-- ================================================================
         FONT AWESOME
         ใช้สำหรับ Icon ต่าง ๆ ในเว็บไซต์
         ================================================================ --}}

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">


    {{-- ================================================================
         VITE
         Public CSS + Public JavaScript
         ================================================================ --}}

    @vite([
        'resources/css/public.css',
        'resources/js/public.js'
    ])


    {{-- ================================================================
         PAGE SPECIFIC STYLES
         ================================================================ --}}

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


    {{-- ================================================================
         PAGE SPECIFIC SCRIPTS
         ================================================================ --}}

    @stack('scripts')


</body>

</html>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin') | LDX Elevator
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        <div class="flex min-w-0 flex-1 flex-col">

            {{-- Header --}}
            @include('layouts.admin.header')

            {{-- Main Content --}}
            <main class="flex-1 p-6">

                @yield('content')

            </main>

        </div>

    </div>

    @stack('scripts')

</body>

</html>
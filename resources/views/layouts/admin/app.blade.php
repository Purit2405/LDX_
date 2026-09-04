
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


<body class="ldx-app-body">

    <div class="ldx-app-shell">

        {{-- ============================================================
            SIDEBAR
        ============================================================= --}}

        @include('layouts.admin.sidebar')


        {{-- ============================================================
            MAIN APPLICATION AREA
        ============================================================= --}}

        <div class="ldx-app-content">

            {{-- Header --}}
            @include('layouts.admin.header')


            {{-- Main Content --}}
            <main class="ldx-app-main">

                @yield('content')

            </main>

        </div>

    </div>


    @stack('scripts')

</body>

</html>


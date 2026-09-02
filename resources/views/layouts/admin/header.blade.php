<header class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 bg-white px-6">

    {{-- Page Title --}}
    <div>

        <h2 class="text-lg font-semibold text-gray-900">
            @yield('page-title', 'Dashboard')
        </h2>

    </div>


    {{-- Admin --}}
    <div class="flex items-center gap-4">

        <div class="text-right">

            <p class="text-sm font-medium text-gray-900">
                {{ auth()->user()->name }}
            </p>

            <p class="text-xs text-gray-500">
                Administrator
            </p>

        </div>

        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-900 text-sm font-semibold text-white">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>

    </div>

</header>
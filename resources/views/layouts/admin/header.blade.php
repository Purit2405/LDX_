
<header class="ldx-admin-header">

    {{-- Page Title --}}
    <div class="ldx-admin-header-title">

        <h2>
            @yield('page-title', 'Dashboard')
        </h2>

    </div>


    {{-- Admin --}}
    <div class="ldx-admin-header-user">

        <div class="ldx-admin-header-user-info">

            <p class="ldx-admin-header-user-name">
                {{ auth()->user()->name }}
            </p>

            <p class="ldx-admin-header-user-role">
                Administrator
            </p>

        </div>

        <div class="ldx-admin-header-avatar">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>

    </div>

</header>

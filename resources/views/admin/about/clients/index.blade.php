
@extends('layouts.admin.app')

@section('title', 'Clients')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <h1 class="ldx-page-title">
                Clients
            </h1>

            <p class="ldx-page-description">
                จัดการข้อมูลและ Logo ของลูกค้าบริษัท
            </p>

        </div>


        <a
            href="{{ route('admin.about.clients.create') }}"
            class="ldx-button ldx-button-primary"
        >
            <span>+</span>
            <span>Add Client</span>
        </a>

    </div>


    {{-- Success Alert --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Alert --}}
    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <p class="ldx-alert-title">
                เกิดข้อผิดพลาด
            </p>

            <ul>

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Client Grid --}}
    <div class="ldx-client-grid">

        @forelse($clients as $client)

            <div class="ldx-client-card">

                {{-- Logo --}}
                <div class="ldx-client-logo">

                    @if($client->logo)

                        <img
                            src="{{ Storage::url($client->logo) }}"
                            alt="{{ $client->name }}"
                        >

                    @else

                        <span>
                            No Logo
                        </span>

                    @endif

                </div>


                {{-- Information --}}
                <div class="ldx-client-content">

                    <h3 class="ldx-client-name">
                        {{ $client->name }}
                    </h3>


                    @if($client->website)

                        <p class="ldx-client-website">
                            {{ $client->website }}
                        </p>

                    @endif


                    <div class="ldx-client-footer">

                        {{-- Status --}}
                        @if($client->is_active)

                            <span class="ldx-badge ldx-badge-success">
                                Active
                            </span>

                        @else

                            <span class="ldx-badge ldx-badge-muted">
                                Hidden
                            </span>

                        @endif


                        {{-- Actions --}}
                        <div class="ldx-actions">

                            <a
                                href="{{ route('admin.about.clients.edit', $client) }}"
                                class="ldx-button ldx-button-secondary ldx-button-sm"
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route('admin.about.clients.destroy', $client) }}"
                                onsubmit="return confirm('ลบ Client นี้หรือไม่?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="ldx-button ldx-button-danger ldx-button-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>


        @empty

            <div class="ldx-empty ldx-empty-full">

                <div class="ldx-empty-icon">
                    🏢
                </div>

                <p class="ldx-empty-title">
                    ยังไม่มี Client
                </p>

                <p class="ldx-empty-description">
                    เพิ่ม Logo ลูกค้าของบริษัท
                </p>

                <a
                    href="{{ route('admin.about.clients.create') }}"
                    class="ldx-button ldx-button-primary"
                >
                    + Add Client
                </a>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}
    @if(method_exists($clients, 'links'))

        <div class="ldx-pagination">
            {{ $clients->links() }}
        </div>

    @endif

</div>

@endsection
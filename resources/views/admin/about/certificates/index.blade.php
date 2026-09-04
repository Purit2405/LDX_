
@extends('layouts.admin.app')

@section('title', 'Certificates')

@section('content')

<div class="ldx-page">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div>
            <h1 class="ldx-page-title">
                Certificates
            </h1>

            <p class="ldx-page-description">
                จัดการใบรับรองและมาตรฐานของบริษัท
            </p>
        </div>

        <a
            href="{{ route('admin.about.certificates.create') }}"
            class="ldx-button ldx-button-primary"
        >
            <span>+</span>
            <span>Add Certificate</span>
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


    {{-- Table --}}
    <div class="ldx-card">

        <div class="ldx-table-wrapper">

            <table class="ldx-table">

                <thead>

                    <tr>

                        <th>
                            Certificate
                        </th>

                        <th>
                            Organization
                        </th>

                        <th>
                            Issued Date
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($certificates as $certificate)

                        <tr>

                            {{-- Certificate --}}
                            <td>

                                <div class="ldx-table-item">

                                    @if($certificate->image)

                                        <img
                                            src="{{ Storage::url($certificate->image) }}"
                                            class="ldx-thumbnail"
                                            alt="{{ $certificate->name }}"
                                        >

                                    @else

                                        <div class="ldx-thumbnail ldx-thumbnail-placeholder">
                                            📜
                                        </div>

                                    @endif


                                    <div>

                                        <p class="ldx-table-title">
                                            {{ $certificate->name }}
                                        </p>


                                        @if($certificate->certificate_number)

                                            <p class="ldx-table-subtitle">
                                                {{ $certificate->certificate_number }}
                                            </p>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- Organization --}}
                            <td>
                                {{ $certificate->issuer ?: '-' }}
                            </td>


                            {{-- Issued Date --}}
                            <td>

                                @if($certificate->issued_date)

                                    {{ $certificate->issued_date->format('d M Y') }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($certificate->is_active)

                                    <span class="ldx-badge ldx-badge-success">
                                        Active
                                    </span>

                                @else

                                    <span class="ldx-badge ldx-badge-muted">
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="ldx-actions">

                                    <a
                                        href="{{ route('admin.about.certificates.edit', $certificate) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.about.certificates.destroy', $certificate) }}"
                                        onsubmit="return confirm('ลบ Certificate นี้หรือไม่?')"
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

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="ldx-empty">

                                    <div class="ldx-empty-icon">
                                        📜
                                    </div>

                                    <p class="ldx-empty-title">
                                        ยังไม่มี Certificate
                                    </p>

                                    <p class="ldx-empty-description">
                                        เพิ่มใบรับรองหรือมาตรฐานของบริษัท
                                    </p>

                                    <a
                                        href="{{ route('admin.about.certificates.create') }}"
                                        class="ldx-button ldx-button-primary"
                                    >
                                        + Add Certificate
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if(method_exists($certificates, 'links'))

            <div class="ldx-pagination">
                {{ $certificates->links() }}
            </div>

        @endif

    </div>

</div>

@endsection


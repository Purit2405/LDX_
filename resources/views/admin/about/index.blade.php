
@extends('layouts.admin.app')

@section('content')

<div class="ldx-page ldx-page-wide">

    <div class="ldx-page-header">

        <h1 class="ldx-page-title">
            About Us
        </h1>

        <p class="ldx-page-description">
            Manage company information
        </p>

    </div>


    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.about.update') }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        {{-- Company Information --}}

        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Company Information
                </h2>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-grid ldx-form-grid-2">

                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Company Name
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            value="{{ old('company_name', $about?->company_name) }}"
                            class="ldx-input"
                        >

                    </div>


                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Tagline
                        </label>

                        <input
                            type="text"
                            name="tagline"
                            value="{{ old('tagline', $about?->tagline) }}"
                            class="ldx-input"
                        >

                    </div>

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Short Description
                    </label>

                    <textarea
                        name="short_description"
                        rows="3"
                        class="ldx-textarea"
                    >{{ old('short_description', $about?->short_description) }}</textarea>

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Company Description
                    </label>

                    <textarea
                        name="description"
                        rows="7"
                        class="ldx-textarea"
                    >{{ old('description', $about?->description) }}</textarea>

                </div>

            </div>

        </div>


        {{-- Vision & Mission --}}

        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Vision & Mission
                </h2>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-grid ldx-form-grid-2">

                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Vision
                        </label>

                        <textarea
                            name="vision"
                            rows="6"
                            class="ldx-textarea"
                        >{{ old('vision', $about?->vision) }}</textarea>

                    </div>


                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Mission
                        </label>

                        <textarea
                            name="mission"
                            rows="6"
                            class="ldx-textarea"
                        >{{ old('mission', $about?->mission) }}</textarea>

                    </div>

                </div>

            </div>

        </div>


        {{-- Images --}}

        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Images
                </h2>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-grid ldx-form-grid-2">

                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Hero Image
                        </label>

                        <input
                            type="file"
                            name="hero_image"
                            accept="image/*"
                            class="ldx-file-input"
                        >


                        @if($about?->hero_image)

                            <img
                                src="{{ asset('storage/'.$about->hero_image) }}"
                                class="ldx-image-preview"
                            >

                        @endif

                    </div>


                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Company Image
                        </label>

                        <input
                            type="file"
                            name="company_image"
                            accept="image/*"
                            class="ldx-file-input"
                        >


                        @if($about?->company_image)

                            <img
                                src="{{ asset('storage/'.$about->company_image) }}"
                                class="ldx-image-preview"
                            >

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Active Status --}}

        <div class="ldx-card">

            <div class="ldx-card-body">

                <label class="ldx-checkbox">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ $about?->is_active ?? true ? 'checked' : '' }}
                    >

                    <span>
                        Show About Us on website
                    </span>

                </label>

            </div>

        </div>


        <div class="ldx-form-actions ldx-form-actions-end">

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection


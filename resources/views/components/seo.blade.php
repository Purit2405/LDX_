@php
    use App\Models\SeoSetting;

    $seo = SeoSetting::first();

    $pageTitle = $title ?? $seo?->meta_title ?? 'LD Elevator';

    $pageDescription =
        $description
        ?? $seo?->meta_description
        ?? '';

    $pageKeywords =
        $keywords
        ?? $seo?->meta_keywords
        ?? '';

    $ogTitle =
        $ogTitle
        ?? $seo?->og_title
        ?? $pageTitle;

    $ogDescription =
        $ogDescription
        ?? $seo?->og_description
        ?? $pageDescription;

    $ogImage =
        $ogImage
        ?? ($seo?->og_image
            ? asset('storage/' . $seo->og_image)
            : null);

    $canonical =
        $canonical
        ?? $seo?->canonical_url
        ?? url()->current();

    $robots =
        $robots
        ?? $seo?->robots
        ?? 'index, follow';
@endphp


<title>{{ $pageTitle }}</title>

<meta
    name="description"
    content="{{ $pageDescription }}"
>

@if($pageKeywords)
    <meta
        name="keywords"
        content="{{ $pageKeywords }}"
    >
@endif

<meta
    name="robots"
    content="{{ $robots }}"
>

<link
    rel="canonical"
    href="{{ $canonical }}"
>


{{-- ========================================================= --}}
{{-- OPEN GRAPH --}}
{{-- ========================================================= --}}

<meta
    property="og:type"
    content="website"
>

<meta
    property="og:title"
    content="{{ $ogTitle }}"
>

<meta
    property="og:description"
    content="{{ $ogDescription }}"
>

<meta
    property="og:url"
    content="{{ url()->current() }}"
>

@if($ogImage)

    <meta
        property="og:image"
        content="{{ $ogImage }}"
    >

@endif


{{-- ========================================================= --}}
{{-- GOOGLE VERIFICATION --}}
{{-- ========================================================= --}}

@if($seo?->google_site_verification)

    <meta
        name="google-site-verification"
        content="{{ $seo->google_site_verification }}"
    >

@endif


{{-- ========================================================= --}}
{{-- BING VERIFICATION --}}
{{-- ========================================================= --}}

@if($seo?->bing_site_verification)

    <meta
        name="msvalidate.01"
        content="{{ $seo->bing_site_verification }}"
    >

@endif
{{-- ========================================================= --}}
{{-- GOOGLE ANALYTICS --}}
{{-- ========================================================= --}}

@if($seo?->google_analytics_id)

    <script
        async
        src="https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics_id }}"
    ></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag(
            'config',
            '{{ $seo->google_analytics_id }}'
        );
    </script>

@endif
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Portfolio | Andhika')</title>

    <meta
        name="description"
        content="Portfolio Andhika — project, skills, dan informasi tentang saya."
    >

    <meta
        name="author"
        content="Andhika"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    {{-- Open Graph --}}
    <meta property="og:type" content="website">

    <meta
        property="og:title"
        content="@yield('title', 'Portfolio | Andhika')"
    >

    <meta
        property="og:description"
        content="Portfolio Andhika — project, skills, dan informasi tentang saya."
    >

    <meta
        property="og:url"
        content="{{ url('/') }}"
    >

    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('favicon.ico') }}"
    >
  <link
    rel="canonical"
    href="{{ url('/') }}"
>

    <link
        rel="stylesheet"
        href="{{ asset('css/portfolio.css') }}"
    >
</head>

<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

</body>

</html>
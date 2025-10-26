<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- CSRF for AJAX/forms -->
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/front/app.js'])
</head>
<body>
    {{-- Header (empty for now) --}}
    <header id="site-header">
        <!-- TODO: add logo, menu, auth/cart buttons -->
    </header>

    {{-- Main page content --}}
    <main id="site-content">
        @yield('content')
    </main>

    {{-- Footer (empty for now) --}}
    <footer id="site-footer">
        <!-- TODO: add footer links -->
    </footer>

    {{-- Vue mount point for modals/widgets on Blade pages --}}
    <div id="front-app"></div>
</body>
</html>

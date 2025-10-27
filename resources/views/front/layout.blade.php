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
    <header id="site-header" class="border-b">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('front.home') }}" class="text-xl font-semibold">Магазин</a>

            <nav class="flex items-center gap-3">
                <!-- Cart button -->
                <button
                    type="button"
                    class="px-3 py-2 rounded hover:bg-gray-100"
                    data-modal="cart"
                >
                    Кошик
                </button>

                <!-- User button: guest -> open auth modal; auth -> toggle user menu -->
                <button
                    type="button"
                    class="px-3 py-2 rounded hover:bg-gray-100"
                    data-modal="user"
                >
                    Профіль
                </button>
            </nav>
        </div>
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

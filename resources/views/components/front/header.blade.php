<header id="site-header" class="border-b">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('front.home') }}" class="text-xl font-semibold">
            {{ __('ui.shop_name') }}
        </a>

        <nav class="flex items-center gap-3">
            <button
                type="button"
                class="px-3 py-2 rounded hover:bg-gray-100"
                data-modal="cart"
            >
                {{ __('ui.cart') }}
            </button>

            <button
                type="button"
                class="px-3 py-2 rounded hover:bg-gray-100"
                data-modal="user"
            >
                {{ __('ui.profile') }}
            </button>
        </nav>
    </div>
</header>

{{-- resources/views/components/front/header/searchbar.blade.php --}}
<div class="bg-[#c9c3d8]">
  <div class="max-w-6xl mx-auto px-4 py-3 flex items-center gap-6">
    {{-- search form (pure Blade) --}}
    <form action="{{ route('front.search') }}" method="get" class="flex flex-1">
      <input
        type="text"
        name="query"
        value="{{ request('query') }}"
        placeholder="{{ __('ui.search_placeholder') }}"
        class="flex-1 bg-white rounded-l-lg px-4 py-2 outline-none"
      >
      <button type="submit" class="px-5 py-2 rounded-r-lg bg-[#b3acc9] text-white hover:opacity-90">
        {{ __('ui.find') }}
      </button>
    </form>

    {{-- right icons --}}
    <nav class="relative flex items-center gap-6 text-white">
      {{-- profile dropdown anchor (must be relative for absolute dropdown) --}}
      <div id="user-dd-anchor" class="relative inline-block">
        <button type="button" data-modal="user" class="hover:opacity-90" title="{{ __('ui.profile') }}">
          <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2a5 5 0 0 0-3.5 8.5A5 5 0 0 0 15.5 8.5 5 5 0 0 0 12 2zM4 22v-1a7 7 0 0 1 7-7h2a7 7 0 0 1 7 7v1H4z"/>
          </svg>
        </button>
      </div>

      {{-- favorites (placeholder) --}}
      <button type="button" data-modal="favorites" class="hover:opacity-90" title="Favorites">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5A5.5 5.5 0 0 1 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
      </button>

      {{-- cart button --}}
      <button type="button" data-modal="cart" class="hover:opacity-90" title="{{ __('ui.cart') }}">
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M7 18a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm10 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM6.556 5 6.058 3H3a1 1 0 1 0 0 2h1.494l1.983 7.967A3.995 3.995 0 0 0 10.36 16h5.23a3.982 3.982 0 0 0 3.895-3.093L21.326 5H6.556z"/>
        </svg>
      </button>
    </nav>
  </div>
</div>

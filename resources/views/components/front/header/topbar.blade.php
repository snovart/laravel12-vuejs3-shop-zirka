{{-- topbar.blade.php --}}
<div class="topbar max-w-6xl mx-auto px-4 py-4 md:py-6 flex items-center justify-between gap-3 flex-wrap">
  <a href="{{ route('front.home') }}" class="flex items-center gap-4 shrink-0">
    <img src="{{ asset('img/logo.png') }}" alt="Zirka" class="h-12 md:h-14">
  </a>

  <div class="flex items-center gap-4 sm:gap-6 text-brand.text">
    {{-- Телефон скрываем на маленьких экранах --}}
    <a href="tel:{{ config('contacts.phone_link') }}" class="hidden sm:inline hover:text-gray-900">
        {{ config('contacts.phone') }}
    </a>

    <a href="https://t.me/wTEG4ljt43BmOGNi" target="_blank"
       class="w-10 h-10 rounded-full bg-brand.lavender flex items-center justify-center hover:bg-brand.lavenderDark">
      <x-icon.telegram />
    </a>

    <a href="https://www.instagram.com/_zirka_ua_" target="_blank"
       class="w-10 h-10 rounded-md border-2 border-brand.lavender flex items-center justify-center hover:border-brand.lavenderDark">
      <x-icon.instagram />
    </a>
  </div>
</div>

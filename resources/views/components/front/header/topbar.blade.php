{{-- topbar.blade.php --}}
<div class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-between">
  <a href="{{ route('front.home') }}" class="flex items-center gap-4">
    <img src="/img/logo.png" alt="Zirka" class="h-14">
    <span class="sr-only">zirka jewelry</span>
  </a>
  <div class="flex items-center gap-6 text-brand.text">
    <a href="tel:{{ config('contacts.phone_link') }}" class="hover:text-gray-900">
        {{ config('contacts.phone') }}
    </a>
    <a href="https://t.me/wTEG4ljt43BmOGNi" target="_blank" class="w-10 h-10 rounded-full bg-brand.lavender flex items-center justify-center hover:bg-brand.lavenderDark">
      <x-icon.telegram />
    </a>
    <a href="https://www.instagram.com/_zirka_ua_" target="_blank" class="w-10 h-10 rounded-md border-2 border-brand.lavender flex items-center justify-center hover:border-brand.lavenderDark">
      <x-icon.instagram />
    </a>
  </div>
</div>

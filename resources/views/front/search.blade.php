@extends('front.layout')

@section('title', __('ui.search_results'))

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-semibold mb-4">
            {{ __('ui.search_results') }}
        </h1>

        @if($query === '')
            <p class="text-gray-600">{{ __('ui.search_hint') }}</p>
        @else
            <p class="text-gray-600 mb-6">
                {{ __('ui.search_query') }}: <span class="font-medium">“{{ $query }}”</span>
            </p>

            {{-- TODO: render real results --}}
            <p class="text-gray-500">{{ __('ui.no_results') }}</p>
        @endif
    </div>
@endsection

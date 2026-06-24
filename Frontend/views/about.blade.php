@extends('layouts.app')

@section('title', __('about.page_title'))
@section('breadcrumb'){{ __('about.breadcrumb') }}@endsection

@section('content')
<div class="py-14 px-4">
    <div class="max-w-4xl mx-auto">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-3">{{ __('about.title') }}</h1>
            <p class="text-gray-500 max-w-xl mx-auto">{{ __('about.subtitle') }}</p>
        </div>

        {{-- Bemutatkozó szöveg --}}
        <div class="bg-brand-50 border-l-4 border-brand-600 rounded-r-xl p-6 mb-10 text-gray-700 leading-relaxed">
            <p class="mb-3">
                {{ __('about.intro1') }} <strong>{{ __('about.intro1_hours') }}</strong> {{ __('about.intro1_end') }}
            </p>
            <p>
                {{ __('about.intro2') }} <strong>{{ __('about.intro2_bold') }}</strong>.
            </p>
        </div>

        {{-- Statisztikák --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm">
                <p class="text-3xl font-bold text-brand-600">27</p>
                <p class="text-gray-500 text-sm mt-1">{{ __('about.stat_capacity') }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm">
                <p class="text-3xl font-bold text-brand-600">10+</p>
                <p class="text-gray-500 text-sm mt-1">{{ __('about.stat_films') }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm">
                <p class="text-3xl font-bold text-brand-600">8–20</p>
                <p class="text-gray-500 text-sm mt-1">{{ __('about.stat_hours') }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm">
                <p class="text-3xl font-bold text-brand-600">6.</p>
                <p class="text-gray-500 text-sm mt-1">{{ __('about.stat_floor') }}</p>
            </div>
        </div>

        {{-- Filmek --}}
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('about.films_title') }}</h2>
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <p class="text-gray-600 mb-4 leading-relaxed">
                    {!! __('about.films_desc') !!}
                </p>
                <a href="{{ route('shows') }}" class="inline-flex items-center gap-2 text-brand-600 hover:text-brand-700 font-semibold text-sm">
                    {{ __('about.films_link') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        {{-- Bérlési feltételek --}}
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('about.rental_title') }}</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-9 h-9 bg-brand-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                        </span>
                        <p class="font-semibold text-gray-800">{{ __('about.screening_name') }}</p>
                    </div>
                    <p class="text-3xl font-bold text-brand-700 mb-2">250 lej</p>
                    <p class="text-sm text-gray-500">{{ __('about.screening_price_note') }}</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/></svg>
                        </span>
                        <p class="font-semibold text-gray-800">{{ __('about.presentation_name') }}</p>
                    </div>
                    <p class="text-3xl font-bold text-green-700 mb-2">300 lej</p>
                    <p class="text-sm text-gray-500">{{ __('about.presentation_note') }}</p>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="text-center bg-brand-700 text-white rounded-2xl p-8">
            <h2 class="text-xl font-bold mb-2">{{ __('about.cta_title') }}</h2>
            <p class="text-brand-100 text-sm mb-5">{{ __('about.cta_desc') }}</p>
            <a href="{{ route('booking') }}" class="inline-flex items-center gap-2 bg-white text-brand-700 font-bold px-6 py-3 rounded-xl hover:bg-brand-50 transition">
                {{ __('about.cta_btn') }}
            </a>
        </div>

    </div>
</div>
@endsection

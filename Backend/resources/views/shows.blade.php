@extends('layouts.app')

@section('title', 'Előadásaink – Egyetemi Planetárium')

@section('content')

<section class="py-24 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-3">Műsoraink</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Előadásaink</h1>
            <p class="text-slate-400 max-w-xl mx-auto">Izgalmas csillagászati kalandok minden korosztály számára – a Naprendszertől a legtávolabbi galaxisokig.</p>
        </div>

        @if($shows->isNotEmpty())
            {{-- Slideshow / Kiemelt előadás --}}
            <div class="relative mb-16 rounded-3xl overflow-hidden bg-slate-900 border border-slate-800" id="slideshow">
                @foreach($shows as $index => $show)
                <div class="slide {{ $index === 0 ? 'block' : 'hidden' }} transition-all" data-slide="{{ $index }}">
                    <div class="flex flex-col md:flex-row min-h-[380px]">
                        {{-- Kép --}}
                        <div class="md:w-1/2 bg-gradient-to-br from-indigo-900/60 to-purple-900/60 flex items-center justify-center p-12">
                            @if($show->image)
                                <img src="{{ asset('storage/' . $show->image) }}" alt="{{ $show->title }}" class="max-h-64 object-contain rounded-xl shadow-xl">
                            @else
                                <div class="w-32 h-32 bg-indigo-900/50 rounded-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9"/>
                                        <circle cx="12" cy="12" r="3" fill="currentColor" class="opacity-60"/>
                                        <ellipse cx="12" cy="12" rx="9" ry="3" transform="rotate(-30 12 12)"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        {{-- Tartalom --}}
                        <div class="md:w-1/2 p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                @if($show->age_recommendation)
                                    <span class="bg-indigo-900/60 text-indigo-300 text-xs font-medium px-3 py-1 rounded-full border border-indigo-700/50">{{ $show->age_recommendation }}</span>
                                @endif
                                <span class="bg-slate-800 text-slate-300 text-xs font-medium px-3 py-1 rounded-full">{{ $show->duration_minutes }} perc</span>
                            </div>
                            <h2 class="text-3xl font-bold mb-4">{{ $show->title }}</h2>
                            <p class="text-slate-300 leading-relaxed mb-6">{{ $show->description }}</p>
                            <a href="{{ route('booking') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3 rounded-xl transition w-fit">
                                Foglalás ehhez az előadáshoz
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- Slideshow vezérlők --}}
                @if($shows->count() > 1)
                <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-slate-900/80 hover:bg-slate-800 border border-slate-700 rounded-full flex items-center justify-center transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-slate-900/80 hover:bg-slate-800 border border-slate-700 rounded-full flex items-center justify-center transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
                {{-- Pontok --}}
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                    @foreach($shows as $index => $show)
                        <button onclick="goToSlide({{ $index }})" class="slide-dot w-2 h-2 rounded-full transition {{ $index === 0 ? 'bg-white' : 'bg-slate-600' }}" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Összes előadás kártya nézetben --}}
            <h2 class="text-2xl font-bold mb-6 text-center">Összes előadásunk</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($shows as $show)
                <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-indigo-700/50 transition group">
                    <div class="bg-gradient-to-br from-indigo-900/40 to-purple-900/40 h-40 flex items-center justify-center">
                        @if($show->image)
                            <img src="{{ asset('storage/' . $show->image) }}" alt="{{ $show->title }}" class="h-full w-full object-cover">
                        @else
                            <svg class="w-12 h-12 text-indigo-500 opacity-50" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            @if($show->age_recommendation)
                                <span class="text-xs text-indigo-300 bg-indigo-900/40 px-2 py-0.5 rounded">{{ $show->age_recommendation }}</span>
                            @endif
                            <span class="text-xs text-slate-400">{{ $show->duration_minutes }} perc</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-indigo-300 transition">{{ $show->title }}</h3>
                        <p class="text-slate-400 text-sm line-clamp-3">{{ $show->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-24 text-slate-500">
                <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/></svg>
                <p class="text-lg">Hamarosan frissülnek az előadások. Nézz vissza később!</p>
            </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.slide-dot');

function showSlide(n) {
    slides.forEach(s => s.classList.add('hidden'));
    dots.forEach(d => { d.classList.remove('bg-white'); d.classList.add('bg-slate-600'); });
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.remove('hidden');
    dots[currentSlide].classList.remove('bg-slate-600');
    dots[currentSlide].classList.add('bg-white');
}

function nextSlide() { showSlide(currentSlide + 1); }
function prevSlide() { showSlide(currentSlide - 1); }
function goToSlide(n) { showSlide(n); }

// Auto-play
setInterval(nextSlide, 5000);
</script>
@endpush

@extends('layouts.app')

@section('title', 'Főoldal – Egyetemi Planetárium')

@section('content')

{{-- Hero szekció --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Csillagos háttér (CSS animáció) --}}
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-indigo-950 to-slate-950"></div>
    <div class="stars absolute inset-0 pointer-events-none"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-indigo-900/40 border border-indigo-700/50 rounded-full px-4 py-1.5 text-sm text-indigo-300 mb-6">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="4"/></svg>
            Fedezd fel az univerzumot
        </div>
        <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
            Universitás<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Planetárium</span>
        </h1>
        <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Kalandozzunk együtt a csillagok között! Modern digitális vetítő rendszerünkkel lenyűgöző előadásokat kínálunk csoportoknak, iskolásoknak és érdeklődőknek.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-indigo-900/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Foglalj időpontot
            </a>
            <a href="{{ route('shows') }}" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-200 border border-slate-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Előadásaink
            </a>
        </div>
    </div>

    {{-- Görgetési jelző --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce text-slate-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

{{-- Kiemelt tények --}}
<section class="py-20 px-4">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 text-center hover:border-indigo-700/50 transition">
            <div class="w-14 h-14 bg-indigo-900/50 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">8K Vetítő</h3>
            <p class="text-slate-400 text-sm">Ultramodern digitális vetítőrendszer, amely valósághű képminőséget biztosít a 360°-os kupolán.</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 text-center hover:border-indigo-700/50 transition">
            <div class="w-14 h-14 bg-purple-900/50 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">Csoportos Foglalás</h3>
            <p class="text-slate-400 text-sm">Iskolai osztályoknak, egyetemi csoportoknak és szervezett látogatásoknak egyaránt ideális helyszín.</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 text-center hover:border-indigo-700/50 transition">
            <div class="w-14 h-14 bg-cyan-900/50 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">Oktatási Célú</h3>
            <p class="text-slate-400 text-sm">Tudományos igényességgel összeállított műsorok, amelyek szórakoztatva tanítanak minden korosztályt.</p>
        </div>
    </div>
</section>

{{-- CTA szekció --}}
<section class="py-16 px-4">
    <div class="max-w-4xl mx-auto bg-gradient-to-br from-indigo-900/40 to-purple-900/40 border border-indigo-700/30 rounded-3xl p-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Tervez látogatást?</h2>
        <p class="text-slate-300 mb-8 max-w-xl mx-auto">Töltsd ki a Google Formot a foglaláshoz, vagy nézd meg az elérhető időpontokat az interaktív naptárban.</p>
        <a href="{{ route('booking') }}" class="inline-flex items-center gap-2 bg-white text-slate-900 font-bold px-8 py-3.5 rounded-xl hover:bg-slate-100 transition-all duration-200">
            Időpont foglalása
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

@push('scripts')
<style>
.stars {
    background-image:
        radial-gradient(1px 1px at 10% 20%, rgba(255,255,255,0.6) 0%, transparent 100%),
        radial-gradient(1px 1px at 30% 60%, rgba(255,255,255,0.4) 0%, transparent 100%),
        radial-gradient(1px 1px at 50% 10%, rgba(255,255,255,0.7) 0%, transparent 100%),
        radial-gradient(1px 1px at 70% 40%, rgba(255,255,255,0.5) 0%, transparent 100%),
        radial-gradient(1px 1px at 90% 80%, rgba(255,255,255,0.6) 0%, transparent 100%),
        radial-gradient(1.5px 1.5px at 20% 80%, rgba(255,255,255,0.3) 0%, transparent 100%),
        radial-gradient(1.5px 1.5px at 60% 30%, rgba(255,255,255,0.4) 0%, transparent 100%),
        radial-gradient(1px 1px at 80% 15%, rgba(255,255,255,0.5) 0%, transparent 100%),
        radial-gradient(1px 1px at 40% 75%, rgba(255,255,255,0.3) 0%, transparent 100%),
        radial-gradient(2px 2px at 55% 55%, rgba(180,180,255,0.4) 0%, transparent 100%);
}
</style>
@endpush

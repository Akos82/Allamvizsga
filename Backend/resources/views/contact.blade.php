@extends('layouts.app')

@section('title', 'Elérhetőségek – Egyetemi Planetárium')

@section('content')

<section class="py-24 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-3">Kapcsolat</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Elérhetőségek</h1>
            <p class="text-slate-400 max-w-xl mx-auto">Kérdésed van? Írj nekünk, hívj fel, vagy látogass el hozzánk személyesen!</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-12">
            {{-- Kapcsolati adatok --}}
            <div class="space-y-6">
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex gap-4 items-start">
                    <div class="w-11 h-11 bg-indigo-900/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Cím</h3>
                        <p class="text-slate-400 text-sm">1117 Budapest, Pázmány Péter sétány 1/A<br>Természettudományi Kar, B épület</p>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex gap-4 items-start">
                    <div class="w-11 h-11 bg-purple-900/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Telefonszám</h3>
                        <p class="text-slate-400 text-sm">+36 1 372 2500<br>Hétfőtől péntekig 9:00–16:00</p>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex gap-4 items-start">
                    <div class="w-11 h-11 bg-cyan-900/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">E-mail</h3>
                        <a href="mailto:planetarium@university.hu" class="text-indigo-400 hover:text-indigo-300 transition text-sm">planetarium@university.hu</a>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex gap-4 items-start">
                    <div class="w-11 h-11 bg-indigo-900/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Nyitvatartás</h3>
                        <div class="text-slate-400 text-sm space-y-1">
                            <p>Hétfő – Péntek: 9:00 – 17:00</p>
                            <p>Szombat: 10:00 – 15:00</p>
                            <p>Vasárnap: Zárva</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Interaktív térkép (Google Maps embed) --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden h-full min-h-[400px]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.5!2d19.0619!3d47.4733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zQnVkYXBlc3Q!5e0!3m2!1shu!2shu!4v1234567890"
                    width="100%"
                    height="100%"
                    style="border:0; min-height: 400px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="grayscale opacity-80 hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                </iframe>
            </div>
        </div>

        {{-- Foglalás CTA --}}
        <div class="text-center">
            <p class="text-slate-400 mb-4">Csoportos látogatást tervez?</p>
            <a href="{{ route('booking') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Időpont foglalása
            </a>
        </div>
    </div>
</section>

@endsection

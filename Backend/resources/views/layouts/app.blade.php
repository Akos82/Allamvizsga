<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Egyetemi Planetárium')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white font-sans">

    {{-- Navigáció --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/90 backdrop-blur border-b border-slate-800">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-semibold tracking-wide">
                <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor"/>
                    <circle cx="12" cy="12" r="4" fill="currentColor" class="text-indigo-400"/>
                    <ellipse cx="12" cy="12" rx="10" ry="4" stroke="currentColor" transform="rotate(-30 12 12)"/>
                </svg>
                Planetárium
            </a>
            <div class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('home') ? 'text-indigo-400' : 'text-slate-300' }}">Főoldal</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('about') ? 'text-indigo-400' : 'text-slate-300' }}">Rólunk</a>
                <a href="{{ route('shows') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('shows') ? 'text-indigo-400' : 'text-slate-300' }}">Előadások</a>
                <a href="{{ route('booking') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('booking') ? 'text-indigo-400' : 'text-slate-300' }}">Foglalás</a>
                <a href="{{ route('contact') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('contact') ? 'text-indigo-400' : 'text-slate-300' }}">Elérhetőségek</a>
            </div>
            {{-- Mobil menü gomb --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 text-slate-300 hover:text-white" aria-label="Menü">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        {{-- Mobil menü --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800 bg-slate-950">
            <div class="px-4 py-3 flex flex-col gap-3 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-indigo-400 {{ request()->routeIs('home') ? 'text-indigo-400' : 'text-slate-300' }}">Főoldal</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-400 {{ request()->routeIs('about') ? 'text-indigo-400' : 'text-slate-300' }}">Rólunk</a>
                <a href="{{ route('shows') }}" class="hover:text-indigo-400 {{ request()->routeIs('shows') ? 'text-indigo-400' : 'text-slate-300' }}">Előadások</a>
                <a href="{{ route('booking') }}" class="hover:text-indigo-400 {{ request()->routeIs('booking') ? 'text-indigo-400' : 'text-slate-300' }}">Foglalás</a>
                <a href="{{ route('contact') }}" class="hover:text-indigo-400 {{ request()->routeIs('contact') ? 'text-indigo-400' : 'text-slate-300' }}">Elérhetőségek</a>
            </div>
        </div>
    </nav>

    {{-- Tartalom --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- Lábléc --}}
    <footer class="border-t border-slate-800 py-8 mt-16">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-400">
            <p>&copy; {{ date('Y') }} Egyetemi Planetárium. Minden jog fenntartva.</p>
            <div class="flex gap-4">
                <a href="{{ route('contact') }}" class="hover:text-white transition">Elérhetőségek</a>
                <a href="{{ route('booking') }}" class="hover:text-white transition">Foglalás</a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>

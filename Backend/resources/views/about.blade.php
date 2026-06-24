@extends('layouts.app')

@section('title', 'Rólunk – Egyetemi Planetárium')

@section('content')

<section class="py-24 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-3">Rólunk</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Az Egyetemi Planetárium</h1>
            <p class="text-slate-400 max-w-2xl mx-auto">Megnyitónk óta az asztronómia és a csillagászat megismertetése a küldetésünk.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <h2 class="text-2xl font-bold mb-4 text-indigo-300">Történetünk</h2>
                <p class="text-slate-300 leading-relaxed mb-4">
                    Planetáriumunk 1985-ben nyílt meg az egyetem természettudományi karának keretein belül, azzal a céllal, hogy a csillagászatot közelebb hozza a diákokhoz és a széles közönséghez.
                </p>
                <p class="text-slate-300 leading-relaxed">
                    Az évtizedek során számos technológiai fejlesztésen ment keresztül az intézmény. A legutóbbi, 2019-es korszerűsítés során egy 8K felbontású, teljes-kupola digitális vetítőrendszert telepítettünk, amely Közép-Európa egyik legmodernebb berendezése.
                </p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <p class="text-4xl font-bold text-indigo-400">1985</p>
                        <p class="text-slate-400 text-sm mt-1">Alapítás éve</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-purple-400">150</p>
                        <p class="text-slate-400 text-sm mt-1">Férőhely</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-cyan-400">8K</p>
                        <p class="text-slate-400 text-sm mt-1">Vetítő felbontás</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-indigo-400">12+</p>
                        <p class="text-slate-400 text-sm mt-1">Műsor típus</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-2xl font-bold mb-6 text-center text-indigo-300">Technikai Felszereltség</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
                    <div class="w-10 h-10 bg-indigo-900/50 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/></svg>
                    </div>
                    <h3 class="font-semibold mb-2">Digitális Vetítő</h3>
                    <p class="text-slate-400 text-sm">Zeiss Velvet 3 8K projektor, 30 méter átmérőjű kupola</p>
                </div>
                <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
                    <div class="w-10 h-10 bg-purple-900/50 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-2">Térhangzás</h3>
                    <p class="text-slate-400 text-sm">7.1 csatornás Dolby Atmos hangrendszer, teljesen körülvevő élmény</p>
                </div>
                <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
                    <div class="w-10 h-10 bg-cyan-900/50 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-2">Távcső Park</h3>
                    <p class="text-slate-400 text-sm">3 darab 20 cm-es refraktor távcső éjszakai megfigyelésekhez</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-6 text-center text-indigo-300">Oktatási Céljaink</h2>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8">
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <p class="text-slate-300">A csillagászat és az asztrofizika alapjainak bemutatása iskolai csoportok számára a tantervhez igazodva</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <p class="text-slate-300">Kutatási projektek és szakkörök támogatása az egyetem hallgatói számára</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <p class="text-slate-300">Közösségi programok és nyílt éjszakai megfigyelések szervezése a nagyközönség számára</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <p class="text-slate-300">Összekötő kapocs az elméleti tudományos ismeretek és a szemléletes, élményszerű oktatás között</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

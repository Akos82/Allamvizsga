@extends('layouts.app')

@section('title', 'Foglalás – Egyetemi Planetárium')

@section('content')

<section class="py-24 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-3">Időpontfoglalás</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Foglalási Naptár</h1>
            <p class="text-slate-400 max-w-xl mx-auto">
                Az alábbi naptárban láthatod a foglalt és szabad időpontokat.
                A foglaláshoz töltsd ki a <strong class="text-white">Google Formot</strong> – a rendszer automatikusan frissíti a naptárat.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Naptár --}}
            <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-2xl p-6">
                {{-- Naptár fejléc --}}
                <div class="flex items-center justify-between mb-6">
                    <button id="prev-month" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-slate-700 flex items-center justify-center transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <h2 id="calendar-title" class="text-lg font-semibold"></h2>
                    <button id="next-month" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-slate-700 flex items-center justify-center transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>

                {{-- Napok fejléce --}}
                <div class="grid grid-cols-7 mb-2">
                    @foreach(['H','K','Sz','Cs','P','Sz','V'] as $day)
                        <div class="text-center text-xs font-medium text-slate-500 py-2">{{ $day }}</div>
                    @endforeach
                </div>

                {{-- Naptár rács --}}
                <div id="calendar-grid" class="grid grid-cols-7 gap-1"></div>

                {{-- Jelmagyarázat --}}
                <div class="flex items-center gap-6 mt-6 text-xs text-slate-400">
                    <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-indigo-600 inline-block"></span>Szabad</span>
                    <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-red-700 inline-block"></span>Foglalt</span>
                    <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-slate-700 inline-block"></span>Múlt / hétvége</span>
                </div>
            </div>

            {{-- Foglalás panel --}}
            <div class="space-y-6">
                {{-- Kiválasztott nap részletei --}}
                <div id="day-detail" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 hidden">
                    <h3 class="font-semibold mb-3 text-indigo-300" id="detail-date"></h3>
                    <div id="detail-bookings" class="space-y-2 text-sm text-slate-300"></div>
                </div>

                {{-- Google Form CTA --}}
                <div class="bg-gradient-to-br from-indigo-900/40 to-purple-900/40 border border-indigo-700/30 rounded-2xl p-6">
                    <h3 class="font-bold text-lg mb-3">Foglalás menete</h3>
                    <ol class="space-y-3 text-sm text-slate-300 mb-6">
                        <li class="flex gap-3">
                            <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">1</span>
                            Ellenőrizd a naptárban a szabad időpontokat
                        </li>
                        <li class="flex gap-3">
                            <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">2</span>
                            Töltsd ki a Google Formot a csoport adataival
                        </li>
                        <li class="flex gap-3">
                            <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">3</span>
                            Néhány percen belül frissül a naptár és megerősítő e-mailt kapsz
                        </li>
                    </ol>
                    <a
                        href="https://forms.google.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3.5 rounded-xl transition"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Foglalási űrlap megnyitása
                    </a>
                </div>

                {{-- Fontos infók --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 text-sm text-slate-400 space-y-2">
                    <p class="font-semibold text-white mb-3">Fontos tudnivalók</p>
                    <p>• Csak csoportos foglalás lehetséges (min. 10 fő)</p>
                    <p>• Az előadások max. 150 főt fogadnak</p>
                    <p>• Lemondás 48 órával előre szükséges</p>
                    <p>• Kérdés esetén: <a href="mailto:planetarium@university.hu" class="text-indigo-400 hover:underline">planetarium@university.hu</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
const MONTHS_HU = ['január','február','március','április','május','június','július','augusztus','szeptember','október','november','december'];
const TODAY = new Date();
let currentYear = TODAY.getFullYear();
let currentMonth = TODAY.getMonth();
let bookedDates = {}; // { 'YYYY-MM-DD': [{time, group, group_size}, ...] }

// Foglalt dátumok betöltése az API-ból
async function loadBookedDates() {
    try {
        const res = await fetch('/api/foglalt-datumok');
        const data = await res.json();
        bookedDates = {};
        data.forEach(b => {
            if (!bookedDates[b.date]) bookedDates[b.date] = [];
            bookedDates[b.date].push(b);
        });
        renderCalendar();
    } catch(e) {
        renderCalendar();
    }
}

function renderCalendar() {
    const title = document.getElementById('calendar-title');
    const grid = document.getElementById('calendar-grid');
    title.textContent = `${currentYear}. ${MONTHS_HU[currentMonth]}`;
    grid.innerHTML = '';

    const firstDay = new Date(currentYear, currentMonth, 1);
    // Magyar naptár: hétfőtől kezd (0=H, 6=V)
    let startOffset = (firstDay.getDay() + 6) % 7;
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Üres cellák a hónap kezdete előtt
    for (let i = 0; i < startOffset; i++) {
        grid.appendChild(createEmptyCell());
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(currentYear, currentMonth, day);
        const dateStr = formatDate(currentYear, currentMonth + 1, day);
        const isPast = date < new Date(TODAY.getFullYear(), TODAY.getMonth(), TODAY.getDate());
        const isToday = date.toDateString() === TODAY.toDateString();
        const isWeekend = date.getDay() === 0 || date.getDay() === 6;
        const isBooked = !!bookedDates[dateStr];

        const cell = document.createElement('button');
        cell.textContent = day;
        cell.className = [
            'aspect-square rounded-lg text-sm font-medium flex items-center justify-center transition',
            isToday ? 'ring-2 ring-indigo-400' : '',
            isPast || isWeekend
                ? 'text-slate-600 cursor-default bg-slate-800/30'
                : isBooked
                    ? 'bg-red-900/50 text-red-300 hover:bg-red-900/70 cursor-pointer'
                    : 'bg-indigo-900/20 text-slate-200 hover:bg-indigo-900/50 cursor-pointer',
        ].join(' ');

        if (!isPast && !isWeekend) {
            cell.addEventListener('click', () => showDayDetail(dateStr, day));
        }

        grid.appendChild(cell);
    }
}

function createEmptyCell() {
    const div = document.createElement('div');
    div.className = 'aspect-square';
    return div;
}

function formatDate(y, m, d) {
    return `${y}-${String(m).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
}

function showDayDetail(dateStr, day) {
    const panel = document.getElementById('day-detail');
    const dateTitle = document.getElementById('detail-date');
    const bookingsDiv = document.getElementById('detail-bookings');
    const [y, m] = dateStr.split('-');
    dateTitle.textContent = `${y}. ${MONTHS_HU[parseInt(m)-1]} ${day}.`;

    if (bookedDates[dateStr]) {
        bookingsDiv.innerHTML = bookedDates[dateStr].map(b =>
            `<div class="flex items-start gap-2 p-2 bg-red-900/20 rounded-lg border border-red-800/30">
                <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div><p class="font-medium text-white">${b.time} – ${b.group}</p><p class="text-slate-400 text-xs">${b.group_size} fő</p></div>
            </div>`
        ).join('');
    } else {
        bookingsDiv.innerHTML = '<p class="text-green-400 flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Ez a nap szabad!</p>';
    }
    panel.classList.remove('hidden');
}

document.getElementById('prev-month').addEventListener('click', () => {
    if (currentMonth === 0) { currentMonth = 11; currentYear--; }
    else currentMonth--;
    renderCalendar();
});
document.getElementById('next-month').addEventListener('click', () => {
    if (currentMonth === 11) { currentMonth = 0; currentYear++; }
    else currentMonth++;
    renderCalendar();
});

loadBookedDates();
</script>
@endpush

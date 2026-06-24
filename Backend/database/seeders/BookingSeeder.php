<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

/**
 * Teszt foglalások – különféle forgatókönyvek demonstrálásához.
 *
 * ESET 1 – Normál foglalás (különböző dátumok) → OK
 * ESET 2 – Ugyanaz a dátum, KÜLÖNBÖZŐ idő → OK (megengedett)
 * ESET 3 – Ugyanaz a dátum ÉS idő (pending + confirmed) → HIBA (double-booking)
 * ESET 4 – Törölt (cancelled) foglalás + új ugyanarra az időpontra → OK
 * ESET 5 – 27 fős kapacitásnál több → jelenleg nincs validáció!
 */
class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::truncate();

        // ─────────────────────────────────────────────────────────
        // ESET 1: Normál, egymást nem zavarba foglalások
        // ─────────────────────────────────────────────────────────

        Booking::create([
            'group_name'    => 'Apor Vilmos Katolikus Iskola',
            'contact_name'  => 'Kovács Mária',
            'contact_email' => 'kovacs.maria@apor.ro',
            'contact_phone' => '+40745123456',
            'group_size'    => 22,
            'booking_date'  => '2026-06-02',
            'booking_time'  => '09:00:00',
            'notes'         => '5–6. osztályosok, csillagászat téma',
            'status'        => 'confirmed',
        ]);

        Booking::create([
            'group_name'    => 'Márton Áron Gimnázium',
            'contact_name'  => 'Székely Péter',
            'contact_email' => 'szekely.peter@magas.ro',
            'contact_phone' => '+40724000111',
            'group_size'    => 18,
            'booking_date'  => '2026-06-04',
            'booking_time'  => '11:00:00',
            'notes'         => null,
            'status'        => 'confirmed',
        ]);

        Booking::create([
            'group_name'    => 'Csíkszeredai Petőfi Sándor Általános Iskola',
            'contact_name'  => 'Nagy Ildikó',
            'contact_email' => 'nagy.ildiko@petofi-csk.ro',
            'contact_phone' => null,
            'group_size'    => 25,
            'booking_date'  => '2026-06-10',
            'booking_time'  => '10:00:00',
            'notes'         => 'Kísérő tanárokkal együtt max 27 fő',
            'status'        => 'pending',
        ]);

        // ─────────────────────────────────────────────────────────
        // ESET 2: Ugyanaz a dátum (jún 8.), KÜLÖNBÖZŐ időpontok → OK
        // ─────────────────────────────────────────────────────────

        Booking::create([
            'group_name'    => 'Sapientia EMTE – Fizika tanszék',
            'contact_name'  => 'Dr. Balogh Zoltán',
            'contact_email' => 'balogh.zoltan@sapientia.ro',
            'contact_phone' => '+40742999888',
            'group_size'    => 15,
            'booking_date'  => '2026-06-08',
            'booking_time'  => '09:00:00',
            'notes'         => 'Elsőéves hallgatók',
            'status'        => 'confirmed',
        ]);

        Booking::create([
            'group_name'    => 'Gyergyószentmiklósi Általános Iskola',
            'contact_name'  => 'Tamás Erika',
            'contact_email' => 'tamas.erika@gyergyo.ro',
            'contact_phone' => '+40755444333',
            'group_size'    => 20,
            'booking_date'  => '2026-06-08',   // ← ugyanaz a nap
            'booking_time'  => '14:00:00',      // ← MÁS időpont → rendben
            'notes'         => 'Délutáni időpont kérve',
            'status'        => 'confirmed',
        ]);

        // ─────────────────────────────────────────────────────────
        // ESET 3: DOUBLE-BOOKING – UGYANAZ A DÁTUM ÉS IDŐ!
        //   jún 1., 10:00 – két különböző csoport
        //   A rendszer ezt engedélyezi → BUG!
        // ─────────────────────────────────────────────────────────

        Booking::create([
            'group_name'    => 'Kolozsvári Babeș-Bolyai Diákok',
            'contact_name'  => 'Fekete Gábor',
            'contact_email' => 'fekete.gabor@ubbcluj.ro',
            'contact_phone' => '+40733777666',
            'group_size'    => 27,
            'booking_date'  => '2026-06-01',
            'booking_time'  => '10:00:00',
            'notes'         => 'Csillagászati kirándulás',
            'status'        => 'confirmed',
        ]);

        // !! KETTŐS FOGLALÁS – UGYANAZ A DÁTUM + IDŐ !!
        Booking::create([
            'group_name'    => 'Székelyudvarhelyi Tomcsa Sándor Iskola',
            'contact_name'  => 'Orbán Réka',
            'contact_email' => 'orban.reka@tomcsa.ro',
            'contact_phone' => '+40766555444',
            'group_size'    => 18,
            'booking_date'  => '2026-06-01',   // ← UGYANAZ a dátum
            'booking_time'  => '10:00:00',      // ← UGYANAZ az idő → ÜTKÖZÉS!
            'notes'         => 'Google Forms-on keresztül érkezett',
            'status'        => 'pending',
        ]);

        // ─────────────────────────────────────────────────────────
        // ESET 4: Törölt foglalás + új foglalás UGYANARRA az időpontra → OK
        //   Ha valaki lemondja, a slot felszabadul
        // ─────────────────────────────────────────────────────────

        Booking::create([
            'group_name'    => 'Lemondott Csoport (Kézdivásárhely)',
            'contact_name'  => 'Demeter Zsolt',
            'contact_email' => 'demeter.zsolt@kv.ro',
            'contact_phone' => null,
            'group_size'    => 12,
            'booking_date'  => '2026-06-09',
            'booking_time'  => '11:00:00',
            'notes'         => 'Lemondva – betegség miatt',
            'status'        => 'cancelled',    // ← törölve, nem foglalja a helyet
        ]);

        Booking::create([
            'group_name'    => 'Sepsiszentgyörgyi Mikó Kollégium',
            'contact_name'  => 'Varga Tünde',
            'contact_email' => 'varga.tunde@miko.ro',
            'contact_phone' => '+40712345678',
            'group_size'    => 24,
            'booking_date'  => '2026-06-09',   // ← ugyanaz mint a lemondott
            'booking_time'  => '11:00:00',      // ← az előző cancelled → ez rendben van
            'notes'         => null,
            'status'        => 'confirmed',
        ]);

        // ─────────────────────────────────────────────────────────
        // ESET 5: Kapacitás-túllépés – nincs védelem!
        //   A planetárium max 27 főt fogad, de 30 fős csoport is berögzíthető
        // ─────────────────────────────────────────────────────────

        Booking::create([
            'group_name'    => 'Marosvásárhelyi Bolyai Farkas Líceum',
            'contact_name'  => 'Simon László',
            'contact_email' => 'simon.laszlo@bolyai.ro',
            'contact_phone' => '+40744888777',
            'group_size'    => 30,             // ← 30 fő: meghaladja a 27-es limitet!
            'booking_date'  => '2026-06-15',
            'booking_time'  => '09:00:00',
            'notes'         => 'Nagy létszám – kérem erősítsék meg, hogy befér-e',
            'status'        => 'pending',
        ]);

        $this->command->info('✓ BookingSeeder: 10 foglalás létrehozva.');
        $this->command->warn('  → ESET 3: Dupla foglalás jún. 1. 10:00 – 2 csoport ugyanarra az időpontra!');
        $this->command->warn('  → ESET 5: Kapacitás-túllépés jún. 15. – 30 főre van rögzítve (limit: 27)!');
    }
}

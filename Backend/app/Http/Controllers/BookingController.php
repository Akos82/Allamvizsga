<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Show;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $shows = Show::where('is_active', true)->orderBy('sort_order')->get();

        if (auth()->user()->is_admin) {
            $bookings = Booking::with('show')
                ->whereIn('status', ['pending', 'confirmed'])
                ->orderBy('booking_date')
                ->orderBy('booking_time')
                ->get();
            return view('booking', compact('shows', 'bookings'));
        }

        return view('booking', compact('shows'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'contact_name'      => 'required|string|max:255',
            'contact_email'     => 'required|email',
            'contact_phone'     => 'required|string|max:50',
            'group_name'        => 'required|string|max:255',
            'booking_date'      => 'required|date|after_or_equal:today',
            'booking_time'      => 'required|date_format:H:i',
            'group_size'        => 'required|integer|min:1|max:27',
            'with_presentation' => 'required|boolean',
            'show_id'           => 'nullable|exists:shows,id',
            'notes'             => 'nullable|string|max:1000',
        ]);

        // Normalize to HH:MM — DB may store HH:MM:SS (Filament) or HH:MM (new form)
        $bookingTime = substr($data['booking_time'], 0, 5);
        $data['booking_time'] = $bookingTime;

        $conflict = Booking::whereDate('booking_date', $data['booking_date'])
            ->whereRaw("substr(booking_time, 1, 5) = ?", [$bookingTime])
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['booking_time' => 'Ez az időpont már foglalt! Válasszon másikat a naptárból.'])
                ->withInput();
        }

        Booking::create(array_merge($data, ['status' => 'confirmed']));

        return redirect()->route('booking')
            ->with('success', 'Foglalása sikeresen beérkezett! Hamarosan felvesszük Önnel a kapcsolatot.');
    }

    public function bookedDates(): JsonResponse
    {
        $dates = Booking::whereIn('status', ['pending', 'confirmed'])
            ->where('group_size', '<=', 27)
            ->get(['booking_date', 'booking_time', 'group_name', 'group_size'])
            ->map(fn ($b) => [
                'date'       => $b->booking_date->format('Y-m-d'),
                'time'       => $b->booking_time,
                'group'      => $b->group_name,
                'group_size' => $b->group_size,
            ]);

        return response()->json($dates);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $reservation = new Reservation();
        $now = new \DateTime();
        $reservation->date = $now->format('Y-m-d');
        $reservation->heure = $now->format('H:i');

        return view('admin.reservation.create', [
            'reservation' => $reservation,
        ]);
    }

    public function store(Request $request)
    {
        // @fixme messages en anglais, utiliser laravel-lang
        $request->validate([
            'nom' => ['required', 'max:190'],
            // @todo valider le tél avec une regex /^[0-9+() ]+$/
            'tel' => ['required', 'max:190'],
            // @fixme date non valide, utiliser DateTime::setTime()
            'date' => ['required', 'date', 'after_or_equal:now'],
            'heure' => ['required'],
            'couverts' => ['required', 'integer', 'between:1,12'],
            // @todo commentaires, utiliser nullable
            'confirmation' => ['required', 'in:0,1,2'],
        ]);

        $reservation = new Reservation();
    }
}

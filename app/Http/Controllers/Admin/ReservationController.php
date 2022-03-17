<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $reservation = new Reservation();
        // @fixme les valeurs par défaut doivent être définies dans le modèle
        $now = new DateTime();
        $reservation->date = $now->format('Y-m-d');
        $reservation->heure = $now->format('H:i');

        return view('admin.reservation.create', [
            'reservation' => $reservation,
            'now' => $now,
        ]);
    }

    public function store(Request $request)
    {
        $today = new DateTime();
        // on fixe l'heure et les minutes à zéro
        $today->setTime(0, 0);

        // @fixme dans les messages d'erreurs, c'est le nom du champ dans la BDD qui est utilisé
        $request->validate([
            // interdiction d'utiliser des chiffres 'not_regex:/[0-9]+/'
            'nom' => ['required', 'min:2', 'max:190', 'not_regex:/[0-9]+/'],
            // obligation d'utiliser des chiffres, parenthèses, des plus ou des espaces 'regex:/^\+?[0-9() ]+$/'
            'tel' => ['required', 'max:190', 'regex:/^\+?[0-9() ]+$/'],
            // @fixme dans le message d'erreur, le mot clé today n'est pas traduit
            // 'date' => ['required', 'date', 'after_or_equal:today'],
            'date' => ['required', 'date', 'after_or_equal:'.$today->format('Y-m-d')],
            'heure' => ['required'],
            'couverts' => ['required', 'integer', 'between:1,12'],
            'commentaires' => ['nullable', 'max:500'],
            'confirmation' => ['required', 'in:0,1,2'],
        ]);

        $reservation = new Reservation();
    }
}

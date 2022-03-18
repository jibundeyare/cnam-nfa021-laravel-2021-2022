<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $today = new DateTime();
        // on fixe l'heure et les minutes à zéro
        $today->setTime(0, 0);

        // récupère les réservations à partir d'aujourd'hui et plus tard, en les triant par jour puis par heure
        $reservations = Reservation::select()
            ->where('date', '>=', $today->format('Y-m-d'))
            ->orderBy('date')
            ->orderBy('heure')
            ->get();

        return view('admin.reservation.index', [
            'reservations' => $reservations,
        ]);
    }

    public function edit(int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            $message = "La réservation {$id} n'existe pas";
            return response()->view('admin.404', [
                'message' => $message,
            ], 404);
        }

        // @fixme les valeurs par défaut doivent être définies dans le modèle
        $now = new DateTime();

        if ($reservation->confirmation === 0) {
            // annulé
            $reservation->confirmation = '0';
        } elseif ($reservation->confirmation === 1) {
            // confirmé
            $reservation->confirmation = '1';
        } else {
            // en attente
            $reservation->confirmation = 'null';
        }

        return view('admin.reservation.edit', [
            'reservation' => $reservation,
            'now' => $now,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            $message = "La réservation {$id} n'existe pas";
            return response()->view('admin.404', [
                'message' => $message,
            ], 404);
        }

        $rules = $this->getRules();
        $validated = $request->validate($rules);

        $reservation = $this->formToModel($validated, $reservation);
        $reservation->save();

        return redirect()->route('admin.reservation.edit', [
            'id' => $reservation->id,
        ]);
    }

    public function create()
    {
        $reservation = new Reservation();
        // @fixme les valeurs par défaut doivent être définies dans le modèle
        $now = new DateTime();
        $reservation->date = $now->format('Y-m-d');
        $reservation->heure = $now->format('H:i');
        $reservation->confirmation = 'null';

        return view('admin.reservation.create', [
            'reservation' => $reservation,
            'now' => $now,
        ]);
    }

    public function store(Request $request)
    {
        $rules = $this->getRules();
        $validated = $request->validate($rules);

        $reservation = new Reservation();
        $reservation = $this->formToModel($validated, $reservation);
        $reservation->save();

        return redirect()->route('admin.reservation.edit', [
            'id' => $reservation->id,
        ]);
    }

    public function destroy(int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            $message = "La réservation {$id} n'existe pas";
            return response()->view('admin.404', [
                'message' => $message,
            ], 404);
        }

        $reservation->delete();

        return redirect()->route('admin.reservation.index');
    }

    public function getRules()
    {
        $today = new DateTime();
        // on fixe l'heure et les minutes à zéro
        $today->setTime(0, 0);

        // @fixme dans les messages d'erreurs, c'est le nom du champ dans la BDD qui est utilisé
        return [
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
            'confirmation' => ['required', 'in:null,0,1'],
        ];
    }

    public function formToModel(array $validated, Reservation $reservation): Reservation
    {
        $reservation->nom = $validated['nom'];
        $reservation->tel = $validated['tel'];
        $reservation->date = $validated['date'];
        $reservation->heure = $validated['heure'];
        $reservation->couverts = $validated['couverts'];
        if (empty($validated['commentaires'])) {
            $reservation->commentaires = '';
        } else {
            $reservation->commentaires = $validated['commentaires'];
        }

        if ($validated['confirmation'] == '0') {
            // annulé
            $reservation->confirmation = 0;
        } elseif ($validated['confirmation'] == '1') {
            // confirmé
            $reservation->confirmation = 1;
        } else {
            // en attente
            $reservation->confirmation = null;
        }

        return $reservation;
    }
}

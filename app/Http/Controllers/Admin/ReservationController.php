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
        $now = new DateTime();

        // récupèration des réservations à partir d'aujourd'hui et plus tard, en les triant par jour puis par heure
        $reservations = Reservation::select()
            ->where('jour', '>=', $now->format('Y-m-d'))
            ->orderBy('jour')
            ->orderBy('heure')
            ->get();

        return view('admin.reservation.index', [
            'title' => 'Liste des réservations',
            'reservations' => $reservations,
        ]);
    }

    public function archive()
    {
        $now = new DateTime();

        // récupèration des réservations avant d'aujourd'hui, en les triant par jour puis par heure
        $reservations = Reservation::select()
            ->where('jour', '<', $now->format('Y-m-d'))
            ->orderBy('jour', 'DESC')
            ->orderBy('heure', 'DESC')
            ->get();

        return view('admin.reservation.index', [
            'title' => 'Liste des anciennes réservations',
            'reservations' => $reservations,
        ]);
    }

    public function create()
    {
        $reservation = new Reservation();
        // dans l'admin, par défaut la réservation est confirmée
        $reservation->confirmation = 1;
        $data = $reservation->modelToForm();
        $now = new DateTime();

        return view('admin.reservation.create', [
            'data' => $data,
            'now' => $now,
        ]);
    }

    public function store(Request $request)
    {
        $rules = $this->getRules();
        $validated = $request->validate($rules);
        $reservation = new Reservation();
        $reservation->formToModel($validated);
        $reservation->save();

        return redirect()->route('admin.reservation.edit', [
            'id' => $reservation->id,
        ]);
    }

    public function edit(int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return $this->error404($id);
        }

        $data = $reservation->modelToForm();
        $now = new DateTime();

        return view('admin.reservation.edit', [
            'data' => $data,
            'now' => $now,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return $this->error404($id);
        }

        $rules = $this->getRules();
        $validated = $request->validate($rules);
        $reservation->formToModel($validated);
        $reservation->save();

        return redirect()->route('admin.reservation.edit', [
            'id' => $reservation->id,
        ]);
    }

    public function destroy(int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return $this->error404($id);
        }

        $reservation->delete();

        return redirect()->route('admin.reservation.index');
    }

    public function error404(int $id)
    {
        $message = "La réservation {$id} n'existe pas";

        return response()->view('admin.error.404', [
            'message' => $message,
        ], 404);
    }

    public function getRules()
    {
        $now = new DateTime();

        // @fixme dans les messages d'erreurs, c'est le nom du champ dans la BDD qui est utilisé
        return [
            // interdiction d'utiliser des chiffres 'not_regex:/[0-9]+/'
            'nom' => ['required', 'min:2', 'max:190', 'not_regex:/[0-9]+/'],
            // obligation d'utiliser des chiffres, parenthèses, des plus ou des espaces 'regex:/^\+?[0-9() ]+$/'
            'tel' => ['required', 'max:190', 'regex:/^\+?[0-9() ]+$/'],
            // @fixme dans le message d'erreur, le mot clé today n'est pas traduit
            // 'jour' => ['required', 'date', 'after_or_equal:today'],
            'jour' => ['required', 'date', 'after_or_equal:'.$now->format('Y-m-d')],
            'heure' => ['required'],
            'couverts' => ['required', 'integer', 'between:1,12'],
            'commentaires' => ['nullable', 'max:500'],
            'confirmation' => ['required', 'in:null,0,1'],
        ];
    }
}

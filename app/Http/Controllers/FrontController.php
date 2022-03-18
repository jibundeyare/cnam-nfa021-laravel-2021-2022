<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\Plat;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    public function index()
    {
        $message = 'foo bar baz';

        return view('front.index', [
            'message' => $message,
        ]);
    }

    public function test()
    {
        // récupère tous les plats
        // $plats = Plat::all();

        // récupère tous les plats, en les triant par ordre alpha de la colonne "nom"
        $plats = Plat::select()->orderBy('nom')->get();

        foreach ($plats as $plat) {
            dump('# le plat');

            dump($plat->id);
            dump($plat->nom);
            // dump($plat->description);
            dump($plat->prix);

            $categorie = $plat->categorie()->first();

            dump('## la catégorie');
            dump($categorie->id);
            dump($categorie->nom);
            dump($categorie->description);

            $etiquettes = $plat->etiquettes()->orderBy('nom')->get();

            dump('## les étiquettes');

            foreach ($etiquettes as $etiquette) {
                dump($etiquette->id);
                dump($etiquette->nom);
                dump($etiquette->description);
            }
        }

        exit();

        // récupère toutes les étiquettes
        // $etiquettes = Etiquette::all();

        // récupère toutes les étiquettes, en les triant par ordre alpha de la colonne "nom"
        $etiquettes = Etiquette::select()->orderBy('nom')->get();

        foreach ($etiquettes as $etiquette) {
            dump($etiquette->id);
            dump($etiquette->nom);
            dump($etiquette->description);

            $plats = $etiquette->plats()->orderBy('nom')->get();

            foreach ($plats as $plat) {
                dump($plat->id);
                dump($plat->nom);
                dump($plat->description);
                dump($plat->prix);
            }
        }

        exit();

        // récupère toutes les catégories
        // $categories = Categorie::all();

        // récupère toutes les catégories, en les triant par ordre alpha de la colonne "nom"
        $categories = Categorie::select()->orderBy('nom')->get();

        foreach ($categories as $categorie) {
            // enregistre les données dans le fichier 'storage/logs/laravel.log'
            // Log::debug($categorie);

            dump($categorie->id);
            dump($categorie->nom);
            dump($categorie->description);

            $plats = $categorie->plats()->orderBy('nom')->get();

            foreach ($plats as $plat) {
                dump($plat->id);
                dump($plat->nom);
                dump($plat->description);
                dump($plat->prix);
            }
        }
    }

    public function testReservation()
    {
        $reservation = new Reservation();

        $reservation->nom = 'Toto';
        $reservation->tel = '0612345678';
        $reservation->date = '2022-04-01';
        $reservation->heure = '18:00';
        $reservation->couverts = 200;
        $reservation->commentaires = '';
        // attention : il ne faut pas définir la confirmation

        // enregistrement des données
        $reservation->save();

        // récupère la réservation dont l'id = 1
        $reservation = Reservation::find(1);
        // modification des données
        $reservation->confirmation = false;
        // enregistrement des données
        $reservation->save();

        // récupère la dernière réservation enregistrée
        // c-à-d le premier élément du tri par ordre descendant de la colonne "id"
        $reservation = Reservation::select()->orderBy('id', 'desc')->first();
        dump('## suppression');
        dump($reservation->id);
        // suppression de l'élément
        $reservation->delete();

        // récupère toutes les réservations, en les triant par jour puis par heure
        $reservations = Reservation::select()->orderBy('date')->orderBy('heure')->get();

        foreach ($reservations as $reservation) {
            dump('# reservation');
            dump($reservation->id);
            dump($reservation->nom);
            dump($reservation->tel);
            dump($reservation->date);
            dump($reservation->heure);
            dump($reservation->couverts);
            dump($reservation->commentaires);
            dump($reservation->confirmation);
            dump($reservation->created_at);
        }
    }
}

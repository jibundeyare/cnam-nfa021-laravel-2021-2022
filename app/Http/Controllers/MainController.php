<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\Plat;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index()
    {
        $message = 'foo bar baz';

        return view('main.index', [
            'message' => $message,
        ]);
    }

    public function test()
    {
        $plats = Plat::all();

        foreach ($plats as $plat) {
            dump($plat->id);
            dump($plat->nom);
            // dump($plat->description);
            dump($plat->prix);

            $categorie = $plat->categorie()->first();

            dump($categorie->id);
            dump($categorie->nom);
            dump($categorie->description);
        }

        exit();

        $etiquettes = Etiquette::all();

        foreach ($etiquettes as $etiquette) {
            dump($etiquette->id);
            dump($etiquette->nom);
            dump($etiquette->description);

            $plats = $etiquette->plats()->get();

            foreach ($plats as $plat) {
                dump($plat->id);
                dump($plat->nom);
                dump($plat->description);
                dump($plat->prix);
            }
        }

        exit();

        $categories = Categorie::all();

        foreach ($categories as $categorie) {
            // enregistre les données dans le fichier `storage/logs/laravel.log`
            // Log::debug($categorie);

            dump($categorie->id);
            dump($categorie->nom);
            dump($categorie->description);

            $plats = $categorie->plats()->get();

            foreach ($plats as $plat) {
                dump($plat->id);
                dump($plat->nom);
                dump($plat->description);
                dump($plat->prix);
            }
        }

        exit();
    }
}

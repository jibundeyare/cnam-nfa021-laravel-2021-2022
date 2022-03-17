<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ajouter la route '/' associée avec l'action MainController::index()
// MainController est une classe et index est une méthode de cette classe
// cette route est nommée 'main.index'
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/test', [MainController::class, 'test'])->name('main.test');
Route::get('/test-resa', [MainController::class, 'testReservation'])->name('main.testReservation');

// redirection interne
Route::redirect('/foo', '/admin/reservation/create');

// redirection externe
Route::redirect('/google', 'https://google.com');

// back office
// affichage du formulaire de création
Route::get('/admin/reservation/create', [ReservationController::class, 'create'])->name('admin.reservation.create');
// traitement des données du formulaire de création
Route::post('/admin/reservation', [ReservationController::class, 'store'])->name('admin.reservation.store');

// affichage du formulaire de modification
Route::get('/admin/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
// traitement des données du formulaire de modification
Route::put('/admin/reservation/{id}', [ReservationController::class, 'update'])->name('admin.reservation.update');

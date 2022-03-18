<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\FrontController;
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
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/test', [FrontController::class, 'test'])->name('front.test');
Route::get('/test-reservation', [FrontController::class, 'testReservation'])->name('front.testReservation');

// redirection interne
Route::redirect('/foo', '/admin/reservation/create');

// redirection externe
Route::redirect('/google', 'https://google.com');

// back office
// affichage de la liste des réservations
Route::get('/admin/reservation', [ReservationController::class, 'index'])->name('admin.reservation.index');
// affichage de la liste des ancienne réservations
Route::get('/admin/reservation/archive', [ReservationController::class, 'archive'])->name('admin.reservation.archive');

// affichage du formulaire de création de réservation
Route::get('/admin/reservation/create', [ReservationController::class, 'create'])->name('admin.reservation.create');
// traitement des données du formulaire de création
Route::post('/admin/reservation', [ReservationController::class, 'store'])->name('admin.reservation.store');

// affichage du formulaire de modification de réservation
Route::get('/admin/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
// traitement des données du formulaire de modification
Route::put('/admin/reservation/{id}', [ReservationController::class, 'update'])->name('admin.reservation.update');

// suppression de réservation
Route::delete('/admin/reservation/{id}', [ReservationController::class, 'destroy'])->name('admin.reservation.destroy');

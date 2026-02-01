<?php

use Illuminate\Support\Facades\Route;
   use App\Http\Controllers\TestPdfController;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\ReparationController;

Route::resource('vehicules', VehiculeController::class);
Route::resource('techniciens', TechnicienController::class);
Route::resource('reparations', ReparationController::class);

Route::post('/vehicules/{vehicule}/acheter', [VehiculeController::class, 'acheter'])
     ->name('vehicules.acheter');
  

Route::get('/test-pdf', [TestPdfController::class, 'generate'])->name('test.pdf');


// CRUD classique


// Formulaire d’achat
Route::get('/vehicules/{vehicule}/acheter', [VehiculeController::class, 'formAcheter'])
     ->name('vehicules.formAcheter');

// Soumission du formulaire → génération du reçu PDF
Route::post('/vehicules/{vehicule}/acheter', [VehiculeController::class, 'acheter'])
     ->name('vehicules.acheter');
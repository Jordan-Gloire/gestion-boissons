<?php

use App\Http\Controllers\BoissonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('boissons', BoissonController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Ajoute ces lignes dans ton fichier routes/web.php

Route::middleware('auth')->group(function () {
    // Liste des ventes pour un utilisateur
    Route::get('/ventes/{userId}', [VenteController::class, 'index'])->name('ventes.index');
    
    // Formulaire pour ajouter une nouvelle vente
    Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create');
    
    // Enregistrer une nouvelle vente
    Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store');
});



require __DIR__.'/auth.php';

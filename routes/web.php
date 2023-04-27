<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeFournisseurController;
use App\Http\Controllers\FleurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('clients', ClientController::class);
Route::resource('fleurs', FleurController::class);
Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);
Route::post('produits/{id}/attach', [ProduitController::class, 'attach'])->name('produits.attach');
Route::get('produits/{id_produit}/detach/{id_fleur}', [ProduitController::class, 'detach'])->name('produits.detach');

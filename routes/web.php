<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VentilationController;
use App\Http\Controllers\VentileurController;
use App\Models\Salaire;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




/** Side-Bar menu active */
/* function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
} */
// Page Login
Route::get('/', function () {
    return view('auth.login');
});

// Page Accueil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Utilisateur profil
Route::middleware('auth')->group(function () {
    Route::get('utilisateur/profil', [UtilisateurController::class, 'profile'])->name('Utilisateur.profil');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';


// Role ADMIN

Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('Admin.Dashboard');
    // Ventilation
    Route::get('ventilation', [VentilationController::class, 'index'])->name('Ventilation.index');
    Route::get('ventilation/ajout', [VentilationController::class, 'create'])->name('Ventilation.ajout');
    Route::post('ventilation/ajout', [VentilationController::class, 'store'])->name('Ventilation.ajouter');
    Route::get('ventilation/detail/{ventilation}', [VentilationController::class, 'detail'])->name('Ventilation.detail');
    Route::get('ventilation/edition/{ventilation}', [VentilationController::class, 'edit'])->name('Ventilation.edition');
    Route::put('ventilation/edition/{ventilation}', [VentilationController::class, 'update'])->name('Ventilation.update');
    Route::delete('ventilation/{ventilation}', [VentilationController::class, 'delete'])->name('Ventilation.delete');
    Route::get('ventilation/filtre', [VentilationController::class, 'filtre'])->name("Ventilation.filtre");
    Route::get('ventilation/rapport', [VentilationController::class, 'rapport'])->name("Ventilation.rapport");
    // Livreur
    Route::get('livreur', [LivreurController::class, 'index'])->name('Livreur.index');
    Route::get('livreur/ajout', [LivreurController::class, 'create'])->name('Livreur.ajout');
    Route::post('livreur/ajout', [LivreurController::class, 'store'])->name('Livreur.ajouter');
    Route::get('livreur/detail/{livreur}', [LivreurController::class, 'edit'])->name('Livreur.edition');
    Route::put('livreur/detail{livreur}', [LivreurController::class, 'update'])->name('Livreur.update');
    Route::delete('livreur/{livreur}', [LivreurController::class, 'delete'])->name('Livreur.delete');
    // Utilisateur
    Route::get('utilisateur', [UtilisateurController::class, 'index'])->name('Utilisateur.index');
    Route::get('utilisateur/ajout', [UtilisateurController::class, 'create'])->name('Utilisateur.ajout');
    Route::post('utilisateur/ajout', [UtilisateurController::class, 'store'])->name('Utilisateur.ajouter');
    Route::get('utilisateur/{utilisateur}', [UtilisateurController::class, 'delete'])->name('Utilisateur.supprimer');
    // Employe
    Route::get('employe', [EmployeController::class, 'index'])->name('Employe.index');
    Route::get('employe/ajout', [EmployeController::class, 'create'])->name('Employe.ajout');
    // Employe
    Route::get('salaire', [SalaireController::class, 'index'])->name('Salaire.index');
    Route::get('salaire/ajout', [SalaireController::class, 'create'])->name('Salaire.ajout');
});

// ROLE VENTILEUR
Route::middleware('auth', 'ventileur')->group(function () {
    Route::get('ventileur/dashboard', [VentileurController::class, 'dashboard'])->name('Ventileur.Dashboard');
    // Route::get('ventilation', [VentilationController::class, 'index'])->name('Ventilation.index');
    /*  Route::get('ventilation/detail/{ventilation}', [VentilationController::class, 'detail'])->name('Ventilation.detail');
    Route::get('ventilation/edition/{ventilation}', [VentilationController::class, 'edit'])->name('Ventilation.edition');
    Route::get('ventilation/ajout', [VentilationController::class, 'create'])->name('Ventilation.ajout');
    Route::post('ventilation/ajout', [VentilationController::class, 'store'])->name('Ventilation.ajouter');
    Route::get('livreur', [LivreurController::class, 'index'])->name('Livreur.index');
    Route::get('utilisateur/profil', [UtilisateurController::class, 'profile'])->name('Utilisateur.profil'); */
});

// ROLE LIVREUR
Route::middleware('auth', 'livreur')->group(function () {
    Route::get('livreur/dashboard', [LivreurController::class, 'dashboard'])->name('Livreur.Dashboard');
    // Route::get('utilisateur/profil', [UtilisateurController::class, 'profile'])->name('Utilisateur.profil');
});

<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\PetrinController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReglageController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VentilationAbonnementController;
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
    Route::get('profil', [ProfilController::class, 'index'])->name('Utilisateur.profil');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

//==============COMMUN=================================

Route::middleware('auth')->group(function () {
    Route::get('/detail/{id}', [VentilationController::class, 'detail_modal'])->name('Ventilation.detail');
    Route::get('Ventilation/edit/{id}', [VentilationController::class, 'edit_modal'])->name('Ventilation.edition');
    Route::put('Ventilation/edition/{ventilation}', [VentilationController::class, 'update'])->name('Ventilation.update');
    Route::post('ventilation/search', [VentilationController::class, 'search'])->name("Ventilation.search");
    // Livreur
    Route::get('/livreur', [LivreurController::class, 'index'])->name('Livreur.index');
    Route::get('livreur/ajout', [LivreurController::class, 'create'])->name('Livreur.ajout');
    Route::post('livreur/ajout', [LivreurController::class, 'store'])->name('Livreur.ajouter');
    Route::get('livreur/detail/{livreur}', [LivreurController::class, 'edit'])->name('Livreur.edition');
    Route::put('livreur/detail{livreur}', [LivreurController::class, 'update'])->name('Livreur.update');
    Route::get('livreur/{livreur}', [LivreurController::class, 'delete'])->name('Livreur.delete');
});

//=================== ROLE ADMIN===========================

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('Admin.Dashboard');
    // Ventilation
    Route::prefix('admin/ventilation')->group(function () {
        Route::get('/', [VentilationController::class, 'index'])->name('Ventilation.index');
        Route::get('/ajout', [VentilationController::class, 'create'])->name('Ventilation.ajout');
        Route::post('/ajout', [VentilationController::class, 'store'])->name('Ventilation.ajouter');
        //Route::get('/detail/{id}', [VentilationController::class, 'detail_modal'])->name('Ventilation.detail');
        // Route::put('/edition/{ventilation}', [VentilationController::class, 'update'])->name('Ventilation.update');
        // Route::get('/edit/{id}', [VentilationController::class, 'edit_modal'])->name('Ventilation.edition');
        Route::get('delete/{id}', [VentilationController::class, 'delete'])->name('Ventilation.delete');
        // Route::post('/search', [VentilationController::class, 'search'])->name("Ventilation.search");
        Route::get('/rapport', [VentilationController::class, 'rapport'])->name("Ventilation.rapport");
        Route::post('/pdf', [VentilationController::class, 'generate_pdf'])->name("Ventilation.pdf");
    });
    // Livreur
    Route::prefix('admin/livreur')->group(function () {
        // Route::get('/', [LivreurController::class, 'index'])->name('Livreur.index');
        // Route::get('/ajout', [LivreurController::class, 'create'])->name('Livreur.ajout');
        // Route::post('/ajout', [LivreurController::class, 'store'])->name('Livreur.ajouter');
        // Route::get('/detail/{livreur}', [LivreurController::class, 'edit'])->name('Livreur.edition');
        //Route::put('/detail{livreur}', [LivreurController::class, 'update'])->name('Livreur.update');
        //Route::get('/{livreur}', [LivreurController::class, 'delete'])->name('Livreur.delete');
    });
    // Abonnés
    Route::prefix('admin/abonnement')->group(function () {
        Route::get('/', [AbonnementController::class, 'index'])->name('Abonnement.index');
        Route::post('/', [AbonnementController::class, 'store'])->name('Abonnement.ajouter');
        Route::get('/edition/{id}', [AbonnementController::class, 'edition'])->name('Abonnement.edition');
        Route::post('/update', [AbonnementController::class, 'update'])->name('Abonnement.update');
        Route::get('/delete/{id}', [AbonnementController::class, 'delete'])->name('Abonnement.delete');
    });
    // Abonnements
    Route::prefix('admin/abonnements')->group(function () {
        Route::get('/', [VentilationAbonnementController::class, 'index'])->name('Abonnements.index');
        Route::post('/', [VentilationAbonnementController::class, 'store'])->name('Abonnements.ajout');
        Route::get('/edition/{id}', [VentilationAbonnementController::class, 'edition'])->name('Abonnements.edition');
        Route::put('/{id}/update/', [VentilationAbonnementController::class, 'update'])->name('Abonnements.update');
        Route::get('/delete/{id}', [VentilationAbonnementController::class, 'delete'])->name('Abonnements.delete');
    });
    // Petrin
    Route::prefix('admin/petrin')->group(function () {
        Route::get('/', [PetrinController::class, 'index'])->name('Petrin.index');
        Route::post('/', [PetrinController::class, 'store'])->name('Petrin.ajout');
        Route::get('/edition/{id}', [PetrinController::class, 'edition'])->name('Petrin.edition');
        Route::put('/update', [PetrinController::class, 'update'])->name('Petrin.update');
        Route::get('/delete/{id}', [PetrinController::class, 'delete'])->name('Petrin.delete');
    });

    // Utilisateur
    Route::prefix('admin/utilisateur')->group(function () {
        Route::get('/', [UtilisateurController::class, 'index'])->name('Utilisateur.index');
        Route::get('/ajout', [UtilisateurController::class, 'create'])->name('Utilisateur.ajout');
        Route::post('/ajout', [UtilisateurController::class, 'store'])->name('Utilisateur.ajouter');
        // Route::get('/{utilisateur}', [UtilisateurController::class, 'edit'])->name('Utilisateur.edit');
        Route::get('detail/{utilisateur}', [UtilisateurController::class, 'edit']);
        Route::get('/{utilisateur}', [UtilisateurController::class, 'delete'])->name('Utilisateur.supprimer');
    });
    // Employe
    Route::prefix('admin/employe')->group(function () {
        Route::get('/', [EmployeController::class, 'index'])->name('Employe.index');
        Route::get('/ajout', [EmployeController::class, 'create'])->name('Employe.ajout');
    });
    // Salaire
    Route::prefix('admin/salaire')->group(function () {
        Route::get('/', [SalaireController::class, 'index'])->name('Salaire.index');
        Route::get('/ajout', [SalaireController::class, 'create'])->name('Salaire.ajout');
    });

    // Reglage
    Route::prefix('admin/reglage')->group(function () {
        Route::get('/', [ReglageController::class, 'index'])->name('Reglage.index');
        Route::get('/create', [ReglageController::class, 'create'])->name('Reglage.ajout');
        Route::post('/create', [ReglageController::class, 'store'])->name('Reglage.ajouter');
    });
});
// ==========================Ventileur======================
// ROLE VENTILEUR
Route::middleware(['auth', 'ventileur'])->group(function () {
    Route::get('ventileur/dashboard', [VentileurController::class, 'dashboard'])->name('Ventileur.Dashboard');
    Route::prefix('ventileur/')->group(function () {
        Route::get('ventilation/ajout', [VentilationController::class, 'create'])->name('Ventileur_ventilation.ajout');
        Route::post('ventilation/ajout', [VentilationController::class, 'store'])->name('Ventileur_ventilation.ajouter');
        Route::get('ventilation', [VentilationController::class, 'index'])->name('Ventileur_ventilation.index');
        Route::get('/detail/{id}', [VentilationController::class, 'detail_modal'])->name('Ventileur_ventilation.detail');
        Route::put('/edition/{ventilation}', [VentilationController::class, 'update'])->name('Ventileur_ventilation.update');
        Route::get('/edit/{id}', [VentilationController::class, 'edit_modal'])->name('Ventileur_ventilation.edition');
    });

    Route::prefix('ventileur/livreur')->group(function () {
        Route::get('livreur', [LivreurController::class, 'index'])->name('Ventileur_livreur.index');
    });
});

// ROLE LIVREUR
Route::middleware(['auth', 'livreur'])->group(function () {
    Route::get('livreur/dashboard', [LivreurController::class, 'dashboard'])->name('Livreur.Dashboard');
    Route::prefix('livreur/')->group(function () {
        // Route::get('utilisateur/profil', [UtilisateurController::class, 'profile'])->name('Utilisateur.profil');
    });
});

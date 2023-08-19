<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Employe;
use App\Models\Livreur;
use App\Models\Salaire;
use App\Models\Ventilation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $montant_ventilation = Ventilation::all()->sum('montant_verse');
        $montant_reliquat = Ventilation::all()->sum('reliquat');
        $total_livreur = Livreur::all()->count();
        $total_abonnement = Abonnement::all()->count();
        $total_employe = Employe::all()->count();
        $montant_salaire = Salaire::all()->sum('montant_net');
        return view('admin.index', compact('montant_ventilation', 'montant_reliquat', 'total_livreur', 'total_abonnement', 'total_employe', 'montant_salaire'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\User;
use App\Models\Ventilation;
use Illuminate\Http\Request;

class VentilationController extends Controller
{
    public function index()
    {
        // $ventilation = Ventilation::all();
        $ventilation = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->join('structures', 'structures.id', '=', 'livreurs.structure_id')
            ->get();
        // var_dump($ventilation);
        return view('ventilation.index', compact('ventilation'));
    }
    public function create(User $user)
    {
        $livreurs = Livreur::all();
        return view('ventilation.ajout', compact('livreurs'));
    }


    // Ajout ventilation
    public function store(Request $request, Ventilation $ventilation)
    {
        $matricule = "V" . mt_rand(5, 5000);
        $request->validate([
            'livreur_id' => 'required|numeric',
            'ventile' => 'required|numeric',
            'date_ventilation' => 'required|date',
            'non_ventile' => 'required|numeric',
            'retour' => 'required|numeric',
            'pu' => 'required|numeric',
            'location' => 'required|numeric',
            'montant_verse' => 'required|numeric',
            'qte_vendue' => 'required|numeric',
            'montant_a_verse' => 'required|numeric',
            'reliquat' => 'required|numeric',
        ]);
        $ventilation->create([
            "livreur_id" => $request->livreur_id,
            "code" => $matricule,
            "date_ventilation" => $request->date_ventilation,
            "ventile" => $request->ventile,
            "non_ventile" => $request->non_ventile,
            "retour" => $request->retour,
            "pu" => $request->pu,
            "location" => $request->location,
            "montant_verse" => $request->montant_verse,
            "qte_vendue" => $request->qte_vendue,
            "montant_a_verse" => $request->montant_a_verse,
            "reliquat" => $request->reliquat,
        ]);

        return back()->with('Message', 'Ventilation ajouté avec success');
    }
    // Detail Ventilation
    public function detail(Ventilation $ventilation)
    {
        return view('ventilation.detail', compact('ventilation'));
    }

    // Edition Ventilation
    public function edit(Ventilation $ventilation, Livreur $livreur)
    {
        $livreur = Livreur::all();
        return view('ventilation.edition', compact('ventilation', 'livreur'));
    }

    // Mise à jour Ventilation
    public function update(Request $request, Ventilation $ventilation)
    {
        $request->validate([
            'livreur_id' => 'required|numeric',
            'ventile' => 'required|numeric',
            'date_ventilation' => 'required|date',
            'non_ventile' => 'required|numeric',
            'retour' => 'required|numeric',
            'pu' => 'required|numeric',
            'location' => 'required|numeric',
            'montant_verse' => 'required|numeric',
            'qte_vendue' => 'required|numeric',
            'montant_a_verse' => 'required|numeric',
            'reliquat' => 'required|numeric',
        ]);
        $ventilation->update([
            "livreur_id" => $request->livreur_id,
            "date_ventilation" => $request->date_ventilation,
            "ventile" => $request->ventile,
            "non_ventile" => $request->non_ventile,
            "retour" => $request->retour,
            "pu" => $request->pu,
            "location" => $request->location,
            "montant_verse" => $request->montant_verse,
            "qte_vendue" => $request->qte_vendue,
            "montant_a_verse" => $request->montant_a_verse,
            "reliquat" => $request->reliquat,
        ]);
        return back()->with('Message', 'Ventilation modifiée avec success');
    }

    public function filtre(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_debut;
        $ventilation = Ventilation::whereBetween('date_ventilation', [$date_debut, $date_fin])->get();
        return view('ventilation.filtre', compact('ventilation'));
    }
    public function filtre_search(Request $request)
    {

        $date_debut = $request->date_debut;
        $date_fin = $request->date_debut;
        $ventilation = Ventilation::whereBetween('date_ventilation', [$date_debut, $date_fin])->get();
        return view('ventilation.filtre', compact('ventilation'));
    }
}

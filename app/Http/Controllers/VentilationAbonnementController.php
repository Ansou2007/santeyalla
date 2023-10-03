<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Ventilation_Abonnement;
use Illuminate\Http\Request;

class VentilationAbonnementController extends Controller
{
    public function index()
    {
        $data = Ventilation_Abonnement::all();
        $abonnes = Abonnement::join('structures', 'structures.id', '=', 'abonnements.structure_id')
            ->select('abonnements.*', 'structures.nom_complet')
            ->get();
        return view('abonnements.index', compact('data', 'abonnes'));
    }

    // Ajout

    public function store(Request $request, Ventilation_Abonnement $ventilation_Abonnement)
    {
        $request->validate(
            [
                "abonnement_id" => "required",
                "date_ventilation" => "required",
                "qte" => "required",
                "pu" => "required",
                //"montant" => "required",
            ]
        );
        $montant = $request->pu * $request->qte;

        $ventilation_Abonnement->create(
            [
                "abonnement_id" => $request->abonnement_id,
                "date_ventilation" => $request->date_ventilation,
                "qte" => $request->qte,
                "pu" => $request->pu,
                "montant" => $montant,
            ]
        );
        return redirect()->back()->with('success', 'Ajout avec succées');
    }

    public function edition($id)
    {
        $abonnements = Ventilation_Abonnement::join('abonnements', 'abonnements.id', '=', 'ventilation__abonnements.abonnement_id')
            ->select('ventilation__abonnements.*', 'abonnements.prenom', 'abonnements.nom')
            ->find($id);
        // $abonnements = Ventilation_Abonnement::find($id);
        return response()->json($abonnements);
    }

    public function update(Request $request, Ventilation_Abonnement $ventilation)
    {
        $request->validate(
            [
                "abonnement_id" => "required",
                "date_ventilation" => "required",
                "qte" => "required",
                "pu" => "required",
                //"montant" => "required",
            ]
        );
        $montant = $request->pu * $request->qte;
        $ventilation->update(
            [
                "abonnement_id" => $request->abonnement_id,
                "date_ventilation" => $request->date_ventilation,
                "qte" => $request->qte,
                "pu" => $request->pu,
                "montant" => $montant,
            ]
        );
        return redirect()->back()->with('success', 'Abonnement modifié');
    }

    public function delete($id)
    {
        $data = Ventilation_Abonnement::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Abonnement supprimé');
    }
}

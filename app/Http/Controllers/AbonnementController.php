<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Structure;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index()
    {
        $abonnes = Abonnement::join('structures', 'structures.id', '=', 'abonnements.structure_id')

            ->select('abonnements.*', 'structures.nom_complet')
            ->get();

        $structure = Structure::all();
        return view('abonnement.index', compact('abonnes', 'structure'));
    }

    public function store(Request $request, Abonnement $abonnement)
    {
        $request->validate(
            [
                "structure_id" => "required",
                "date_abonnement" => "required",
                "prenom" => "required",
                "nom" => "required",
                "telephone" => "required|numeric|unique:abonnements,telephone",
            ]
        );
        $abonnement->create(
            [
                "structure_id" => $request->structure_id,
                "date_abonnement" => $request->date_abonnement,
                "prenom" => $request->prenom,
                "nom" => $request->nom,
                "telephone" => $request->telephone
            ]
        );
        return redirect()->back()->with('Message', "Abonné ajouté");
    }

    public function edition($id)
    {
        $data = Abonnement::join('structures', 'structures.id', '=', 'abonnements.structure_id')
            ->select('abonnements.*', 'structures.nom_complet')
            ->find($id);
        return response()->json($data);
    }

    public function update(Request $request, Abonnement $abonnement)
    {
        $request->validate(
            [
                "structure_id" => 'required',
                "prenom" => 'required',
                "nom" => 'required',
                "telephone" => 'required',
                "date_abonnement" => 'required',
            ]
        );
        $abonnement->update(
            [
                "structure_id" => $request->structure_id,
                "prenom" => $request->prenom,
                "nom" => $request->nom,
                "date_abonnement" => $request->date_abonnement,
            ]
        );
        return redirect()->back()->with('Message', 'Abonné modifié');
    }
}

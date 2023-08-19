<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\Structure;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    // Dashboard

    public function dashboard()
    {
        return view('livreur.dashboard');
    }
    public function index()
    {
        $livreur = Livreur::all();
        return view('livreur.index', compact('livreur'));
    }
    public function create()
    {
        $structure = Structure::all();
        return view('livreur.ajout', compact('structure'));
    }
    public function store(Request $request, Livreur $livreur)
    {
        $matricule = "L" . mt_rand(5, 5000) . Date('d-m');
        $request->validate([
            "prenom" => 'required',
            "nom" => 'required',
            "structure_id" => 'required',
            "telephone" => 'required|numeric|unique:livreurs,telephone',
            // "photo" => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        if (Livreur::where('telephone', $request->telephone)->count() > 0) {

            return back()->with("Store", "Livreur existe déja");
        } else {
            $livreur->create([
                "matricule" => $matricule,
                "structure_id" => $request->structure_id,
                "prenom" => $request->prenom,
                "nom" => $request->nom,
                "telephone" => $request->telephone,
                "adresse" => $request->adresse,
                "typePiece" => $request->typePiece,
                "numeroPiece" => $request->numeroPiece,
                "photo" => $request->photo
            ]);

            return back()->with("Message", "Livreur ajouté avec succés");
        }
    }

    public function edit(Livreur $livreur)
    {
        $structure = Structure::all();
        return view('livreur.edition', compact('structure', 'livreur'));
    }
    public function update(Request $request, Livreur $livreur)
    {
        $request->validate([
            "prenom" => 'required',
            "nom" => 'required',
            "structure_id" => 'required',
            // "telephone" => 'required|numeric|unique:livreurs,telephone',
            "telephone" => 'required|numeric',
            // "photo" => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

        $livreur->update([
            "structure_id" => $request->structure_id,
            "prenom" => $request->prenom,
            "nom" => $request->nom,
            "telephone" => $request->telephone,
            "adresse" => $request->adresse,
            "typePiece" => $request->typePiece,
            "numeroPiece" => $request->numeroPiece,
            "photo" => $request->photo
        ]);

        return back()->with("Message", "Livreur modifié avec succés");
    }
}

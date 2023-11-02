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
        if (auth()->user()->role == 'Admin') {
            $livreur = Livreur::all();
            return view('livreur.index', compact('livreur'));
        } else {
            $id_boulangerie = auth()->user()->structure_id;
            $livreur = Livreur::where('structure_id', $id_boulangerie)->get();
            return view('livreur.index', compact('livreur'));
        }
    }
    public function create()
    {
        if (auth()->user()->role == 'Admin') {
            $structure = Structure::all();
            return view('livreur.ajout', compact('structure'));
        } else {
            $id_boulangerie = auth()->user()->structure_id;
            $structure = Structure::where('id', $id_boulangerie)->get();
            return view('livreur.ajout', compact('structure'));
        }
    }
    public function store(Request $request, Livreur $livreur)
    {
        $matricule = "L" . mt_rand(5, 5000) . Date('d-m');
        $request->validate([
            "prenom" => 'required',
            "nom" => 'required',
            "structure_id" => 'required',
            // "telephone" => 'required|numeric|unique:livreurs,telephone',
            "telephone" => 'required|numeric|',
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
                "taux" => $request->taux,
                "telephone" => $request->telephone,
                "adresse" => $request->adresse,
                "typePiece" => $request->typePiece,
                "numeroPiece" => $request->numeroPiece,
                "photo" => $request->photo
            ]);
            toastr()->success('Ajout avec success');
            return back();
        }
    }

    public function edit(Livreur $livreur)
    {
        $structure = Structure::all();
        return view('livreur.edition', compact('structure', 'livreur'));
    }

    // Modification
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
            "taux" => $request->taux,
            "telephone" => $request->telephone,
            "adresse" => $request->adresse,
            "typePiece" => $request->typePiece,
            "numeroPiece" => $request->numeroPiece,
            "photo" => $request->photo
        ]);
        toastr()->success('Livreur modifié avec succés');
        return back();
    }

    // Suppression

    public function delete($id)
    {
        $livreur = Livreur::find($id);
        $livreur->delete();
        // toastr()->success('Livreur supprimé avec success');
        return back()->with('success', 'Livreur supprimé avec success');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Petrin;
use App\Models\Structure;
use Illuminate\Http\Request;

class PetrinController extends Controller
{
    public function index()
    {
        $structure = Structure::all();
        $petrin = Petrin::all();
        return view('petrin.index', compact('petrin', 'structure'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'structure_id' => 'required',
                'nbre_sac' => 'required',
                'qte_produit' => 'required',
                'date_petrin' => 'required',
            ]
        );
        $rendement = ($request->qte_produit) / ($request->nbre_sac);
        Petrin::create(
            [
                'structure_id' => $request->structure_id,
                'nbre_sac' => $request->nbre_sac,
                'date_petrin' => $request->date_petrin,
                'qte_produit' => $request->qte_produit,
                'rendement' => $rendement,
            ]
        );
        // toastr()->success('ajout success');
        return back()->with('success', 'Ajout avec succees');
    }
}

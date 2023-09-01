<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\Structure;
use App\Models\User;
use App\Models\Ventilation;
use PDF;
use Illuminate\Http\Request;

class VentilationController extends Controller
{
    public function index()
    {
        $livreur = Livreur::all();
        $boulangerie = Structure::all();
        $ventilation = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->join('structures', 'structures.id', '=', 'livreurs.structure_id')
            ->select('ventilations.*', 'livreurs.prenom', 'livreurs.nom', 'structures.nom_complet')
            ->where('ventilations.status', 'Actif')
            ->orderBy('date_ventilation', 'desc')
            ->get();
        return view('ventilation.index', compact('ventilation', 'livreur', 'boulangerie'));
    }

    // Recherche
    public function search(Request $request)
    {
        $livreur = Livreur::all();
        $boulangerie = Structure::all();

        $filtre_livreur = $request->matricule;
        $tout_livreur = $request->tout;
        $un_livreur = $request->livreur;

        $filtre_structure = $request->boulangerie;
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;
        $ventilation = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->join('structures', 'structures.id', '=', 'livreurs.structure_id')
            ->select('ventilations.*', 'livreurs.matricule', 'livreurs.prenom', 'livreurs.nom', 'livreurs.telephone', 'structures.nom_complet')
            //->where('livreurs.matricule', $filtre_livreur)
            ->when($un_livreur, function ($query) use ($request) {
                $query->where('livreurs.matricule', $request->livreur);
            })
            ->where('nom_complet', $filtre_structure)
            ->whereBetween('date_ventilation', [$date_debut, $date_fin])
            ->orderBy('date_ventilation', 'desc')
            ->get();
        return view('ventilation.index', compact('ventilation', 'livreur', 'boulangerie'));
    }


    // Page Ajout Ventilation
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
    // Detail Modal
    public function detail_modal($ventilation)
    {
        $data = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->select('ventilations.*', 'livreurs.prenom', 'livreurs.nom')
            ->find($ventilation);
        return response()->json($data);
    }
    // Edition Modal
    public function edit_modal($ventilation)
    {
        $data = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->select('ventilations.*', 'livreurs.prenom', 'livreurs.nom')
            ->find($ventilation);
        return response()->json($data);
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

    // suppression
    public function delete($id)
    {
        $ventilation = Ventilation::find($id);
        $ventilation->delete();
        return back()->with('Message', 'Ventilation supprimée avec success');
    }

    /*  public function filtre(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;
        // $ventilation = Ventilation::whereBetween('date_ventilation', [$date_debut, $date_fin])->get();
        $ventilation = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->join('structures', 'structures.id', '=', 'livreurs.structure_id')
            ->select('ventilations.*', 'livreurs.prenom', 'livreurs.nom', 'structures.nom_complet')
            ->whereBetween('date_ventilation', [$date_debut, $date_fin])
            ->get();
        return view('ventilation.filtre', compact('ventilation'));
    } */
    // Rapport Ventilation
    public function rapport(Request $request)
    {
        $livreur = Livreur::all();
        $boulangerie = Structure::all();
        return view('ventilation.rapport', compact('boulangerie', 'livreur'))->with('Message', 'Aucune données trouvée');
    }

    // Generer rapport pdf
    public function generate_pdf(Request $request)
    {
        $livreur = Livreur::all();
        $boulangerie = Structure::all();
        $filtre_livreur = $request->livreur_id;
        $filtre_strcuture = $request->boulangerie;
        $ventilation = Ventilation::join('livreurs', 'livreurs.id', '=', 'ventilations.livreur_id')
            ->join('structures', 'structures.id', '=', 'livreurs.structure_id')
            ->select('ventilations.*', 'livreurs.matricule', 'livreurs.prenom', 'livreurs.nom', 'livreurs.telephone', 'livreurs.taux', 'structures.nom_complet')
            ->where('livreur_id', $filtre_livreur)
            ->where('nom_complet', $filtre_strcuture)
            ->orderBy('date_ventilation', 'desc')
            ->get();
        if ($ventilation->count() > 0) {
            // $data['ventilation'] = $ventilation;
            $pdf = PDF::loadView('pdf.rapport_ventilation', compact('ventilation'));
            return $pdf->download('ventilation.pdf');
            //return $pdf->stream();
        } else {
            return view('ventilation.rapport', compact('boulangerie', 'livreur'))->with('Message', 'Aucune données trouvée');
        }
    }
}

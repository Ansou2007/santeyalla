<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index()
    {

        $utilisateur = User::all();
        return view('utilisateur.index', compact('utilisateur'));
    }

    public function create()
    {
        $structure = Structure::all();
        return view('utilisateur.ajout', compact('structure'));
    }
    // Enregistrement
    public function store(Request $request, User $user)
    {
        $request->validate([
            "prenom" => "required",
            "structure_id" => "required",
            "nom" => "required",
            "email" => "required|unique:users,email",
            "telephone" => "required|numeric",

        ]);
        $user->create([
            "prenom" => $request->prenom,
            "structure_id" => $request->structure_id,
            "nom" => $request->nom,
            "email" => $request->email,
            "telephone" => $request->telephone,
            "password" => Hash::make('passer123'),
            "role" => $request->role,
            "status" => $request->status,
            "adresse" => $request->adresse

        ]);
        return back()->with('Message', 'Utilisateur ajouté avec success');
    }
    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    // Profil Utilisateur
    public function profile()
    {
        $id = Auth()->user()->id;
        $profil = User::find($id);
        return view('utilisateur.profil', compact('profil'));
    }

    public function profile_update(Request $request)
    {
        $id = Auth()->user()->id;
        $profil = User::find($id);
        $profil->prenom = $request->prenom;
        $profil->nom = $request->nom;
        $profil->email = $request->email;
        $profil->telephone = $request->telephone;
        $profil->adresse = $request->adresse;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('photo/utilisateur'), $filename);
            $profil['photo'] = $filename;
        }
        $profil->save();
        $notification = array(
            "message" => "Profil modifié avec success",
            "alert-type" => "success"
        );
        return back()->with($notification);
    }
}

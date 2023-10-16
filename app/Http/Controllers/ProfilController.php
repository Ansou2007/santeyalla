<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $profil = User::find($id);
        return view('profil.index', compact('profil'));
    }
}

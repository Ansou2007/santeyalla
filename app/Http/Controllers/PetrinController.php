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
}

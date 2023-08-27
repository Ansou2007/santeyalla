<?php

namespace App\Http\Controllers;

use App\Models\Reglage;
use Illuminate\Http\Request;

class ReglageController extends Controller
{
    public function index()
    {
        $reglage = Reglage::all();
        return view('reglage.index', compact('reglage'));
    }
    public function create()
    {
        return view('reglage.ajout');
    }

    public function store(Request $request, Reglage $reglage)
    {
        $request->validate([
            'type' => 'required',
            'value' => 'required',
        ]);
        $reglage->create([
            'type' => $request->type,
            'value' => $request->value
        ]);
        return back()->with('Message', 'Configuration ajouté');
    }
}

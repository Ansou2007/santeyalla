<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaireController extends Controller
{
    //
    public function index()
    {
        return view('salaire.index');
    }
    public function create()
    {
        return view('salaire.ajout');
    }
}

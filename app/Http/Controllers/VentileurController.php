<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentileurController extends Controller
{
    //
    public function dashboard()
    {
        return view('ventileur.dashboard');
    }
}

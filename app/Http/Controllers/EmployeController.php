<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //
    public function index()
    {
        return view('employe.index');
    }
    public function create()
    {
        return view('employe.ajout');
    }
}

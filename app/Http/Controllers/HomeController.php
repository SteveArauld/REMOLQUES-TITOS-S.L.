<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Page d'accueil rendue à l'identique du site statique (index.html).
        return view('wp.home');
    }
}

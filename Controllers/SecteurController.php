<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\modeles\Secteur;

class SecteurController extends Controller
{
    /*
     * Affiche les secteurs dans une liste déroulante
     * @return Vue formRecherche
     */
    public function getSecteurs() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $secteur = new Secteur();
        $secteurs = $secteur->getSecteurs();
        return view('formRecherche', compact('secteurs', 'erreur'));
    }
}

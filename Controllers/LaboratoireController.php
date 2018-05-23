<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\modeles\Laboratoire;

class LaboratoireController extends Controller
{
    /*
     * Affiche les laboratoires dans une liste déroulante
     * @return Vue formRecherche
     */
    public function getLaboratoires() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $laboratoire = new Laboratoire();
        $laboratoires = $laboratoire->getLaboratoires();
        return view('formRecherche', compact('laboratoires', 'erreur'));
    }
}

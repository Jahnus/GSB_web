<?php
namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use DB;

class Secteur extends Model
{
    /*
     * Liste des secteurs
     * @return collection de Secteur
     */
    public function getSecteurs() {
        $secteurs = DB::table('secteur')->get();
        return $secteurs;
    }
}

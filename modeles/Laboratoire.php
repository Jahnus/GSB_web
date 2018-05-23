<?php
namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use DB;

class Laboratoire extends Model
{
    /*
     * Liste des laboratoires
     * @return collection de Laboratoire
     */
    public function getLaboratoires() {
        $laboratoires = DB::table('laboratoire')->get();
        return $laboratoires;
    }   
}

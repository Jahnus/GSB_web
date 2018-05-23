<?php
namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use DB;
use Exception;

class Visiteur extends Model
{
    /*
     * Lecture de tous les visiteurs avec
     * mise en oeuvre des jointures
     * @return Collection de Visiteur
     */
    public function getVisiteurs() {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'nom_laboratoire', 'lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un nom
     * @param string $nom_visiteur
     * @return Collection de Visiteur
     */
    public function getVisiteursNom($nom) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('nom_visiteur', '=', $nom)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un laboratoire
     * @param int $id_laboratoire
     * @return Collection de Visiteur
     */
    public function getVisiteursLabo($id_laboratoire) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('visiteur.id_laboratoire', '=', $id_laboratoire)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un secteur
     * @param int $id_secteur
     * @return Collection de Visiteur
     */
    public function getVisiteursSecteur($id_secteur) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('visiteur.id_secteur', '=', $id_secteur)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un nom et d'un laboratoire
     * @param string $nom_visiteur
     * @param int $id_laboratoire
     * @return Collection de Visiteur
     */
    public function getVisiteursNomLabo($nom, $id_laboratoire) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('nom_visiteur', '=', $nom)
                ->where('visiteur.id_laboratoire', '=', $id_laboratoire)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    
    /*
     * Recherche d'un visiteur en fonction d'un nom et d'un secteur
     * @param string $nom_visiteur
     * @param int $id_secteur
     * @return Collection de Visiteur
     */
    public function getVisiteursNomSecteur($nom, $id_secteur) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('nom_visiteur', '=', $nom)
                ->where('visiteur.id_secteur', '=', $id_secteur)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un laboratoire et d'un secteur
     * @param int id_laboratoire
     * @param int id_secteur
     * @return Collection de Visiteur
     */
    public function getVisiteursLaboSecteur($id_laboratoire, $id_secteur) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('visiteur.id_laboratoire', '=', $id_laboratoire)
                ->where('visiteur.id_secteur', '=', $id_secteur)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un nom, d'un laboratoire et d'un secteur
     * @param string $nom_visiteur
     * @param int $id_laboratoire
     * @param int $id_secteur
     * @return Collection de Visiteur
     */
    public function getVisiteursNomLaboSecteur($nom, $id_laboratoire, $id_secteur) {
        $visiteurs = DB::table('visiteur')
                ->Select('id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'adresse_visiteur', 'cp_visiteur', 'ville_visiteur', 'date_embauche', 'laboratoire.nom_laboratoire', 'secteur.lib_secteur')
                ->where ('type_visiteur', '=', 'V')
                ->where('nom_visiteur', '=', $nom)
                ->where('visiteur.id_laboratoire', '=', $id_laboratoire)
                ->where('visiteur.id_secteur', '=', $id_secteur)
                ->join('laboratoire', 'visiteur.id_laboratoire', '=', 'laboratoire.id_laboratoire')
                ->join('secteur', 'visiteur.id_secteur', '=', 'secteur.id_secteur')
                ->get()
                ->sortBy('nom_visiteur');
        return $visiteurs;
    }
    
    /*
     * Recherche d'un visiteur en fonction d'un Id
     * @param int $id_visiteur
     * @return un Visiteur
     */
    public function getVisiteur($id_visiteur) {
        $visiteur = DB::table('visiteur')
                ->select()
                ->where('id_visiteur', '=', $id_visiteur)
                ->first();
        return $visiteur;
    }
    
    /*
     * Mise à jour d'un Visiteur en fonction de son Id
     * @param int $id_visiteur
     * @param string $nom_visiteur
     * @param string $prenom_visiteur
     * @param string $adresse_visiteur
     * @param int $cp_visiteur
     * @param string $ville_visiteur
     * @param date $date_embauche
     * @param string $login_visiteur
     * @param string $pwd_visiteur
     * @param char $type_visiteur
     * @param int $id_laboratoire
     * @param int $id_secteur
     */
    public function updateVisiteur($id_visiteur, $nom_visiteur, $prenom_visiteur, $adresse_visiteur, $cp_visiteur, $ville_visiteur, $date_embauche, $login_visiteur, $pwd_visiteur, $id_laboratoire, $id_secteur) {
        try {
            DB::table('visiteur')->where('id_visiteur', '=', $id_visiteur)
                    ->update(['nom_visiteur' => $nom_visiteur,
                            'prenom_visiteur' => $prenom_visiteur,
                            'adresse_visiteur' => $adresse_visiteur,
                            'cp_visiteur' => $cp_visiteur,
                            'ville_visiteur' => $ville_visiteur,
                            'date_embauche' => $date_embauche,
                            'login_visiteur' => $login_visiteur,
                            'pwd_visiteur' => $pwd_visiteur,
                            'id_laboratoire' => $id_laboratoire,
                            'id_secteur' => $id_secteur]);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    /*
     * Insertion d'un visiteur
     * Note: la clé primaire (id_visiteur) est en auto-incrément
     * @param string $nom_visiteur
     * @param string $prenom_visiteur
     * @param string $adresse_visiteur
     * @param int $cp_visiteur
     * @param string $ville_visiteur
     * @param date $date_embauche
     * @param string $login_visiteur
     * @param string $pwd_visiteur
     * @param char $type_visiteur
     * @param int $id_laboratoire
     * @param int $id_secteur
     */
    public function insertVisiteur($nom_visiteur, $prenom_visiteur, $adresse_visiteur, $cp_visiteur, $ville_visiteur, $date_embauche, $login_visiteur, $pwd_visiteur, $type_visiteur, $id_laboratoire, $id_secteur) {
        $visiteur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login_visiteur)
                ->first();
        try {
            DB::table('visiteur')->insert([
                'nom_visiteur' => $nom_visiteur,
                'prenom_visiteur' => $prenom_visiteur,
                'adresse_visiteur' => $adresse_visiteur,
                'cp_visiteur' => $cp_visiteur,
                'ville_visiteur' => $ville_visiteur,
                'date_embauche' => $date_embauche,
                'login_visiteur' => $login_visiteur,
                'pwd_visiteur' => $pwd_visiteur,
                'type_visiteur' => $type_visiteur,
                'id_laboratoire' => $id_laboratoire,
                'id_secteur' => $id_secteur
            ]);
        } catch (Exception $ex) {
            if ($visiteur) {
                throw new Exception('Login déjà utilisé!!!');
            } else {
                throw $ex;
            }            
        }        
    }
    
    /*
     * Suppression d'un visiteur en fonction de son Id
     * @param int $id_visiteur
     */
    public function deleteVisiteur($id_visiteur) {
        try {
            DB::table('visiteur')->where('id_visiteur', '=', $id_visiteur)
                    ->delete();
            DB::table('travailler')->where('id_visiteur', '=', $id_visiteur)
                    ->delete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

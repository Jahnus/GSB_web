<?php
namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Session;
use App\modeles\Visiteur;
use App\modeles\Laboratoire;
use App\modeles\Secteur;
use Exception;

class VisiteurController extends Controller
{
    /*
     * Affiche la liste de tous les Visiteurs
     * Si la Session contient un message d'erreur,
     * on le récupère et on le supprime de la Session
     * @return Vue listeVisiteurs
     */
    public function getVisiteurs() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $visiteur = new Visiteur();
        // On récupère la liste de tous les visiteurs
        $visiteurs = $visiteur->getVisiteurs();
        // On affiche la liste de ces visiteurs
        return view('listeVisiteurs', compact('visiteurs', 'erreur'));
    }
    
    /*
     * Initialise les listes déroulantes dans le formulaire 
     * de recherche de visiteur
     * @return Vue formRecherche
     */
    public function searchVisiteur() {
        $erreur = (Session::get('erreur')) || "";
        Session::forget('erreur');
        $laboratoire = new Laboratoire();
        $laboratoires = $laboratoire->getLaboratoires();
        $secteur = new Secteur();
        $secteurs = $secteur->getSecteurs();
        return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
    }
    
    /*
     * Recherche les résultats en fonction des différents paramètres passés
     * Si il n'y a pas de résultat, @return Vue formRecherche et affiche l'erreur "Pas de résultat !"
     * Si résultat, @return Vue listeVisiteurs avec les résultats concernés
     */
    public function getVisiteursRecherche() {
        $erreur = (Session::get('erreur')) || "";
        Session::forget('erreur');
        // On récupère le nom tapé dans la recherche
        $nom = Request::input('cbNom');
        // On récupère le laboratoire sélectionné
        $id_laboratoire = Request::input('cbLabo');
        // On récupère le secteur sélectionné
        $id_secteur = Request::input('cbSecteur');
        
        if ($nom && $id_laboratoire > 0 && $id_secteur > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursNomLaboSecteur($nom, $id_laboratoire, $id_secteur);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($nom && $id_laboratoire > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursNomLabo($nom, $id_laboratoire);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($nom && $id_secteur > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursNomSecteur($nom, $id_secteur);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($id_laboratoire > 0 && $id_secteur > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursLaboSecteur($id_laboratoire, $id_secteur);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($nom) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursNom($nom);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($id_laboratoire > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursLabo($id_laboratoire);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else if ($id_secteur > 0) {
            $visiteur = new Visiteur();
            $visiteurs = $visiteur->getVisiteursSecteur($id_secteur);
            if (count($visiteurs) > 0) {
                return view('listeVisiteurs', compact('visiteurs', 'erreur'));
            } else {
                $erreur = "Aucun résultat !";
                Session::put('erreur', $erreur);
                $laboratoire = new Laboratoire();
                $laboratoires = $laboratoire->getLaboratoires();
                $secteur = new Secteur();
                $secteurs = $secteur->getSecteurs();
                return view('formRecherche', compact('laboratoires', 'secteurs', 'erreur'));
            }
        } else {
            $visiteur = new Visiteur();
            // On récupère la liste de tous les visiteurs
            $visiteurs = $visiteur->getVisiteurs();
            // On affiche la liste de ces visiteurs
            return view('listeVisiteurs', compact('visiteurs', 'erreur'));
        }
    }
    
    /*
     * Initialise le formulaire de modification d'un visiteur en fonction de son Id
     * en renseignant toutes les infos dispo sur le visiteur
     * et en initialisant les listes déroulantes pour les laboratoires et secteurs
     * @param int $id_visiteur
     * @return Vue formVisiteur
     */
    public function updateVisiteur($id_visiteur, $erreur = "") {
        $leVisiteur = new Visiteur();
        $visiteur = $leVisiteur->getVisiteur($id_visiteur);
        $laboratoire = new Laboratoire();
        $laboratoires = $laboratoire->getLaboratoires();
        $secteur = new Secteur();
        $secteurs = $secteur->getSecteurs();
        $titreVue = "Modification d'un visiteur";
        
        return view('formVisiteur', compact('visiteur', 'laboratoires', 'secteurs', 'titreVue', 'erreur'));
    }
    
    /*
     * Enregistre les modifications faites pour le visiteur
     * Si la modification provoque une erreur fatale,
     * on la place dans la Session et on réaffiche le formulaire
     * Sinon réaffiche la liste des visiteurs
     * @return Redirection listerVisiteurs
     */
    public function validateVisiteur() {
        // Récupération des valeurs saisies dans le formulaire
        $id_visiteur = Request::input('id_visiteur');
        $nom_visiteur = ucfirst(Request::input('nom'));
        $prenom_visiteur = Request::input('prenom');
        $adresse_visiteur = Request::input('adresse');
        $cp_visiteur = Request::input('cp');
        $ville_visiteur = strtoupper(Request::input('ville'));
        $date_embauche = Request::input('date');
        $login_visiteur = Request::input('login');
        $pwd_visiteur = Request::input('pwd');
        $id_laboratoire = Request::input('cbLabo');
        $id_secteur = Request::input('cbSecteur');
        $type_visiteur = 'V';
        
        $visiteur = new Visiteur();
        
        if ($id_laboratoire == 0) {
            $erreur = "Sélectionner un laboratoire !";
            if ($id_visiteur > 0) {
                return $this->updateVisiteur($id_visiteur, $erreur);
            } else {
                return $this->addVisiteur($erreur);
            } 
        }  
        if ($id_secteur == 0) {
            $erreur = "Sélectionner un secteur !";
            if ($id_visiteur > 0) {
                return $this->updateVisiteur($id_visiteur, $erreur);
            } else {
                return $this->addVisiteur($erreur);
            }
        }
        
        try {
            if ($id_visiteur > 0) {
                $visiteur->updateVisiteur($id_visiteur, $nom_visiteur, $prenom_visiteur, $adresse_visiteur, $cp_visiteur, $ville_visiteur, $date_embauche, $login_visiteur, $pwd_visiteur, $id_laboratoire, $id_secteur);
            } else {
                $visiteur->insertVisiteur($nom_visiteur, $prenom_visiteur, $adresse_visiteur, $cp_visiteur, $ville_visiteur, $date_embauche, $login_visiteur, $pwd_visiteur, $type_visiteur, $id_laboratoire, $id_secteur);
            }            
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            if ($id_visiteur > 0) {
                return $this->updateVisiteur($id_visiteur, $erreur);
            } else {
                return $this->addVisiteur($erreur);
            }            
        }
        // On réaffiche la liste des visiteurs
        return redirect('/listerVisiteurs');
    }
    
    /*
     * Initialise les listes déroulantes
     * Place le formulaire en formVisiteur en mode ajout
     * @param string $erreur message d'erreur (paramètre optionnel)
     * @return Vue formVisiteur
     */
    public function addVisiteur($erreur = "") {
        $visiteur = new Visiteur();
        $laboratoire = new Laboratoire();
        $laboratoires = $laboratoire->getLaboratoires();
        $secteur = new Secteur();
        $secteurs = $secteur->getSecteurs();
        $titreVue = "Ajout d'un visiteur";
        // Affiche le formulaire en lui fournissant les données à afficher
        return view('formVisiteur', compact('visiteur', 'laboratoires', 'secteurs', 'titreVue', 'erreur'));
    }
    
    /*
     * Supression d'un visiteur en fonction de son Id
     * Si la suppression provoque une erreur fatale
     * on la place dans la Session
     * Dans tous les cas on réaffiche la liste des visiteurs
     * @param int $id_visiteur
     * @return Redirection listerVisiteurs
     */
    public function deleteVisiteur($id_visiteur) {
        $erreur = "";
        try {
            $visiteur = new Visiteur();
            $visiteur->deleteVisiteur($id_visiteur);
            return redirect('/listerVisiteurs');
        } catch (Exception $ex) {
            Session::put('erreur', $ex->getMessage());
        } finally {
            return redirect('/listerVisiteurs');
        }
    }
}

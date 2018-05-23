<?php
namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Utilisateur extends Model
{
    /*
     * Authentifie l'utilisateur sur son login et Mdp
     * Si c'est OK, son id et son rôle sont enregistrés dans la session
     * Cela lui donne accès au menu général (page master)
     * @param string $login: Login de l'utilisateur
     * @param string $pwd: Mdp de l'utilisateur
     * @return boolean: true or false
     */
    public function login($login, $pwd) {
        $connected = false;
        $user = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login)
                ->first();
        if ($user) {
            // Si le mdp saisi est le même que celui enregistré
            if ($user->pwd_visiteur == $pwd) {
                Session::put('id', $user->id_visiteur);
                Session::put('role', $user->type_visiteur);
                $connected = true;
            }
        }
        return $connected;
    }
    
    /*
     * Délogue l'utilisateur en supprimant son Id
     * de la session => le menu n'est plus accessible
     */
    public function logout() {
        Session::forget('id');
        Session::forget('role');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification
Route::get('/getLogin', 'UtilisateurController@getLogin');

// Réponse à la validation du formulaire d'authentification
Route::post('/signIn', 'UtilisateurController@signIn');

// Déloguer l'utilisateur
Route::get('/signOut', 'UtilisateurController@signOut');

// Afficher la liste de tous les Visiteurs
Route::get('/listerVisiteurs', 'VisiteurController@getVisiteurs')->middleware('autorise');

// Afficher le formulaire de recherche de visiteur
Route::get('/rechercherVisiteur', 'VisiteurController@searchVisiteur')->middleware('autorise');

// Afficher le résultat de la recherche
Route::post('/listerVisiteursRecherche', 'VisiteurController@getVisiteursRecherche')->middleware('autorise');

// Afficher le formulaire de modification d'un visiteur
Route::get('/modifierVisiteur/{id_visiteur}', 'VisiteurController@updateVisiteur')->middleware('autorise');

// Enregistrer la modification d'un visiteur
Route::post('/validerVisiteur', 'VisiteurController@validateVisiteur');

// Afficher le formulaire d'ajout d'un visiteur
Route::get('/ajouterVisiteur', 'VisiteurController@addVisiteur')->middleware('autorise');

// Supprimer un visiteur
Route::get('/supprimerVisiteur/{id}', 'VisiteurController@deleteVisiteur');
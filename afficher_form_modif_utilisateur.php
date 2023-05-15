<?php

/*

Controller : Affichage du formulaire de modification d'un utilisateur

Paramètres : 
    GET id : l'i de l'utilisateur

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres 

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/connexion.php";
    exit;
} 

$user = utilisateurConnecte();
$_SESSION["role"] = $user->get("role");
$role = $_SESSION["role"];

// Récupération des paramètres
if (empty($_GET["id"]) || $_GET["id"] == $_SESSION["id"]) {
    $utilisateur = new utilisateur();
    $listeUtilisateurs = $utilisateur->getAllActif();
    include "templates/pages/liste_utilisateurs.php";
    exit;
}

$idUtilisateur = $_GET["id"];

// On veut afficher la liste des utilisateurs
// On commence par créer l'objet utilisateur
$utilisateur = new utilisateur($idUtilisateur);

// On affiche la liste
include "templates/pages/form/modification_utilisateur.php";



// Affichage 

?>
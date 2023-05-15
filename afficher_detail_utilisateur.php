<?php

/*

Contrôleur : Affichage de l'utilisateur dont l'id est donné

Paramètres : 
    GET id

*/

// Initialisation
include "library/init.php";

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/connexion.php";
    exit;
} 

// Récupération des paramètres
if (empty($_GET["id"])) {
    // On veut afficher la liste des utilisateurs
    // On commence par créer l'objet utilisateur
    $utilisateur = new utilisateur();

    // ON récupère la liste
    $listeUtilisateurs = $utilisateur->getAllActif();
    // On affiche la liste
    include "templates/pages/liste_utilisateurs.php";
    exit;
}

$user = utilisateurConnecte();
$_SESSION["role"] = $user->get("role");
$role = $_SESSION["role"];

$idUtilisateur = $_GET["id"];

// On veut afficher la liste des utilisateurs
// On commence par créer l'objet utilisateur
$utilisateur = new utilisateur($idUtilisateur);

// On affiche la liste
include "templates/pages/detail_utilisateur.php";




// Récupération



// Affichage 

?>
<?php

/*

Contrôleur : Affichage de la liste des utilisateurs pour les "admins"

Paramètres : néant

*/

// Initialisation
include "library/init.php";

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/connexion.php";
    exit;
} 

$user = utilisateurConnecte();
$_SESSION["role"] = $user->get("role");
$role = $_SESSION["role"];

// On veut afficher la liste des utilisateurs
// On commence par créer l'objet utilisateur
$utilisateur = new utilisateur();

// ON récupère la liste
$listeUtilisateurs = $utilisateur->getAllActif();
// On affiche la liste
include "templates/pages/liste_utilisateurs.php";




// Récupération



// Affichage 

?>
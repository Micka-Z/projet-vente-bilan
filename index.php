<?php

/*

Contrôleur : Affichage de la page d'accueil (une liste de prospects) si connecté, sinon formulaire de connexion

Paramètres : néant

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres 

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/connexion.php";
    exit;
} else {
    // SINON on récupère l'utilisateur connecté, on charge la liste des prospects et on l'affiche

    $user = utilisateurConnecte();
    $_SESSION["role"] = $user->get("role");
    $role = $_SESSION["role"];

    $prospect = new prospect();

    $listeProspects = $prospect->getAll();

    include "templates/pages/liste_prospects.php";
}



// Récupération



// Affichage 

?>

<?php

/*

Controller : Affichage du formulaire de création d'un nouveau prospect

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres 

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/form_connexion.php";
} else {
    $user = utilisateurConnecte();
    $_SESSION["role"] = $user->get("role");
    $role = $_SESSION["role"];
    // SINON on affiche le formulaire de création
    include "templates/pages/form/creation_prospect.php";
}

// Récupération



// Affichage 

?>
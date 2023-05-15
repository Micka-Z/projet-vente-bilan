<?php

/*

Contrôleur : Affichage de la liste des prospects où une action est nécessaire (statut "A qualifier" ou "a suivre")

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
$prospect = new prospect();

// ON récupère la liste
$listeProspects = $prospect->getAllQS();
// On affiche la liste
include "templates/pages/liste_prospects_suivis.php";




// Récupération



// Affichage 

?>
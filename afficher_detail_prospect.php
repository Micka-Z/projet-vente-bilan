<?php

/*

Contrôleur : Affichage du prospect dont l'id est donné

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
    // On veut afficher la liste des prospects
    // On commence par créer l'objet prospect
    $prospect = new prospect();

    // ON récupère la liste
    $listeProspects = $utilisateur->getAll();
    // On affiche la liste
    include "templates/pages/liste_prospects.php";
    exit;
}

$user = utilisateurConnecte();
$_SESSION["role"] = $user->get("role");
$role = $_SESSION["role"];

$idProspect = $_GET["id"];


// On commence par créer l'objet prospect
$prospect = new prospect($idProspect);

// ON crée l'objet APPEL
$appel = new appel();
// On veut la liste des actions du prospect sélectionné
$listeAppels = $appel->getListeAppelsProspect($idProspect);

// On affiche la liste
include "templates/pages/detail_prospect.php";




// Récupération



// Affichage 

?>
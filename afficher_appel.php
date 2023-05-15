<?php

/*

Controller : Affichage du formulaire de création d'un nouvel utilisateur

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

// Récupération
$idProspect = $_GET["id"];
$heureAppel = date("Y-m-d H:i:s");

// On commence par créer l'objet prospect
$prospect = new prospect($idProspect);

// ON crée l'objet APPEL
$appel = new appel();
// On veut la liste des actions du prospect sélectionné
$listeAppels = $appel->getListeAppelsProspect($idProspect);

// Affichage 
include "templates/pages/detail_appel.php";
?>
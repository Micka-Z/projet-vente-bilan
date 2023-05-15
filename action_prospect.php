<?php

/*

Controller : Modification du statut du prospect

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

// On commence par créer l'objet prospect
$prospect = new prospect($idProspect);

// On modifie le statut si il est envoyé
if(!empty($_POST["statut"])) {
    $statut = $_POST["statut"];
    $prospect->set("statut", $statut);
}

if(!empty($_POST["date_action"])) {
    $date_action = $_POST["date_action"];
    $prospect->set("date_action", $date_action);
} else {
    $prospect->set("date_action", "");
}

// On met à jour le prospect dans la base de données
$prospect->update();

$listeProspects = $prospect->getAll();
// Affichage 
include "templates/pages/liste_prospects.php";
?>
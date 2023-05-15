<?php

/*

Controller : Insertion dans la base de données les éléments récupérés du formulaire pour la création d'un nouvel utilisateur

Paramètres : 
    POST debut_tel : la date et l'heure de début
    POST commentaire : le commentaire
    POST etat : le statut de l'appel
    GET id : l'id du prospect

*/

// Initialisation
include "library/init.php";

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/form_connexion.php";
} else {
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

    $idProspect = $_GET["id"];

    // Récupération des paramètres 
    // SI un des paramètres n'est pas saisi
    if (empty($_POST["debut_tel"]) || empty($_POST["commentaire"]) || empty($_POST["etat"])) {
        // On commence par créer l'objet prospect
        $prospect = new prospect();

        // ON récupère la liste
        $listeProspects = $prospect->getAllQS();
        // On affiche la liste
        include "templates/pages/liste_prospects_suivis.php";
    } else {
        
        // Création d'un nouvel objet appel
        $appel = new appel();
        // Chargement de l'objet avec les informations récupérées du formulaire
        $appel->chargerInfosDepuisTableau($_POST);
        // On met le statut actif à 1
        $appel->set("prospect", $idProspect);
        $appel->set("fin_tel", date("Y-m-d h:i:s"));

        // On réalise l'insertion dans la base de données
        $appel->insert();

        $prospect = new prospect($idProspect);
        // On affiche le détail du appel
        include "templates/pages/form/nouveau_statut.php";
    }

}

// Récupération



// Affichage 

?>
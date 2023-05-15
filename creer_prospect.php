<?php

/*

Controller : Insertion dans la base de données les éléments récupérés du formulaire pour la création d'un nouvel utilisateur

Paramètres : 
    POST raison_sociale : la raison sociale du prospect
    POST siret : le numéro de siret
    POST email_contact : l'email de contact
    POST nom_contact : le nom du contact
    

*/

// Initialisation
include "library/init.php";

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/form_connexion.php";
} else {

    $user = utilisateurConnecte();
    $_SESSION["role"] = $user->get("role");
    $role = $_SESSION["role"];

    // Récupération des paramètres 
    // SI un des paramètres n'est pas saisi
    if (empty($_POST["raison_sociale"]) || empty($_POST["siret"]) || empty($_POST["email_contact"]) || empty($_POST["nom_contact"]) || empty($_POST["date_action"])) {
        // ALORS on réaffiche le formulaire de création
        include "templates/pages/form/creation_prospect.php";
    } else {
        
        // Création d'un nouvel objet prospect
        $prospect = new prospect();
        // Chargement de l'objet avec les informations récupérées du formulaire
        $prospect->chargerInfosDepuisTableau($_POST);
        // On donne le statut "A qualifier" pour le nouveau prospect
        $prospect->set("statut", "à qualifier");
        print_r($prospect);
        // On réalise l'insertion dans la base de données
        $prospect->insert();
        // On affiche le détail du prospect
        include "templates/pages/detail_propsect.php";
    }

}

// Récupération



// Affichage 

?>
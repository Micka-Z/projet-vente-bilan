<?php

/*

Controller : Insertion dans la base de données les éléments récupérés du formulaire pour la création d'un nouvel utilisateur

Paramètres : 
    POST nom : le nom
    POST login : le login
    POST password : le mot de passe
    POST role : le role

*/

// Initialisation
include "library/init.php";

// SI il n'y a pas d'utilisateur de connecté
if (!isConnected()) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/form/form_connexion.php";
} else {



    // Récupération des paramètres 
    // SI un des paramètres n'est pas saisi
    if (empty($_POST["nom"]) || empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["role"])) {
        // ALORS on réaffiche le formulaire de création
        include "templates/pages/form/creation_utilisateur.php";
    } else {
        
        // Création d'un nouvel objet utilisateur
        $utilisateur = new utilisateur();
        // Chargement de l'objet avec les informations récupérées du formulaire
        $utilisateur->chargerInfosDepuisTableau($_POST);
        // On met le statu actif à 1
        $utilisateur->set("actif", 1);
        print_r($utilisateur);
        // On réalise l'insertion dans la base de données
        $utilisateur->insert();
        // On affiche le détail de l'utilisateur
        include "templates/pages/detail_utilisateur.php";
    }

}

// Récupération



// Affichage 

?>
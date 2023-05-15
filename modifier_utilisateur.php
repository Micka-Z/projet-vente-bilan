<?php

/*

Controller : Insertion dans la base de données les éléments récupérés du formulaire pour la création d'un nouvel utilisateur

Paramètres : 
    GET id : l'id
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
    if (empty($_GET["id"])) {
        // Création d'un nouvel objet utilisateur
        $utilisateur = new utilisateur();
        $listeUtilisateurs = $utilisateur->getAllActif();        
        include "templates/pages/liste_utilisateurs.php";
        exit;
    }
    // Récupération des paramètres 
    // SI un des paramètres n'est pas saisi
    if (empty($_POST["nom"]) || empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["role"]) || empty($_POST["actif"])) {
        // ALORS on réaffiche le formulaire de création
        include "templates/pages/form/modification_utilisateur.php";
    } else {
        $idUtilisateur = $_GET["id"];
        // Création d'un nouvel objet utilisateur
        $utilisateur = new utilisateur($idUtilisateur);
        // Chargement de l'objet avec les informations récupérées du formulaire
        $utilisateur->chargerInfosDepuisTableau($_POST);

        // On réalise l'insertion dans la base de données
        $utilisateur->update();
        // On affiche le détail de l'utilisateur
        include "templates/pages/detail_utilisateur.php";
    }

}

// Récupération



// Affichage 

?>
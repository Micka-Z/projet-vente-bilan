<?php

/*

Contrôleur : Affichage de la liste des prospects, si connecté

Paramètres : 
    POST login : login de connexion
    POST password : mot de passe de connexion

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres 
if (!empty($_POST["login"])) {
    $login = $_POST["login"];
}

if (!empty($_POST["password"])) {
    $password = $_POST["password"];
}

// SI les informations de connexion saisies sont vides OU ne correspondent pas à un utilisateur
if (!connecter($login, $password)) {
    // ALORS affichage de la page de connexion

    include "templates/pages/form/connexion.php";    
} else {
    // On le rôle de l'utilisateur dans la session et on charge la liste des prospects
    $user = utilisateurConnecte();
    $role = $_SESSION["role"];
    //$prospect = new prospect();


   // $listeProspects = $prospect->getAll();

    include "templates/pages/liste_prospects.php";
}



// Récupération



// Affichage 

?>
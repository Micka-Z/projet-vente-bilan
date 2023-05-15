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
$login = $_POST["login"];
$password = $_POST["password"];

// SI les informations de connexion saisies sont vides OU ne correspondent pas à un utilisateur
if (empty($login) && empty($password)) {
    // ALORS affichage de la page de connexion
    include "templates/pages/form/form_connexion.php";
} elseif (!connecter($login, $password)) {
    // ALORS affichage de la page de connexion

    include "templates/pages/form/form_connexion.php";    
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
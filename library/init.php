<?php
/* Initialisation générale des programmes

   Fichier à inclure en début de toutes les URL

*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Ajout des fichiers de fonctions
//include_once("library/outils.php");
include_once("library/model.php");
include_once("data/utilisateur.php");
include_once("data/prospect.php");
include_once("data/appel.php");
include_once("library/session.php");
include_once("data/fonctions.php");

// On récupère la variable globale $bdd
global $bdd; 

// Connexion à la base de données et ouverture
$bdd = new PDO("mysql:host=localhost;dbname=dbname;charset=UTF8", "username", "password");
// En mise au point : pour afficher les erreurs que remonte la base d données
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
<?php

/*

Template de page : Mise en page de la liste des utilisateurs 

Paramètres :
    $listeProspects

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <div class="container">
        <?php
        //print_r($_SESSION);
        include "templates/fragments/header.php";
        ?>

        <main>
            <h1 class="text-center text-uppercase">Liste des utilisateurs</h1>
            <?php
            foreach ($listeUtilisateurs as $unUtilisateur) {
                ?>
                <ul class="list-group my-3">
                    <li class="list-group-item bg-light fw-bold"><?= htmlentities($unUtilisateur->get("nom")) ?></li>
                    <li class="list-group-item"><a class="btn btn-warning" href="afficher_detail_utilisateur.php?id=<?= htmlentities($unUtilisateur->id()) ?>">Modifier</a></li>
                </ul>
                <?php
            }
            ?>
        </main>
    </div>
</body>
</html>

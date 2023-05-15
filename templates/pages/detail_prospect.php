<?php

/*

Template : Affichage du détail d'un prospect

Paramètres :
    

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
    <title>Détail du propsect: <?= $prospect->get("raison_sociale") ?></title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Détail du prospect: <span class="text-success fw-bold"><?= $prospect->get("raison_sociale") ?></span>   </h1>
            <div class="row">
                <table class="table">
                    <tr>
                        <th scope="col">Raison sociale</th>
                        <th scope="col">Code SIRET</th>
                        <th scope="col">Email de contact</th>
                        <th scope="col">Nom du contact</th>
                        <th scope="col">Date de la prochaine action</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tr>
                        <td><?= htmlentities($prospect->get("raison_sociale")) ?></td>
                        <td><?= htmlentities($prospect->get("siret")) ?></td>
                        <td><?= htmlentities($prospect->get("email_contact")) ?></td>
                        <td><?= htmlentities($prospect->get("nom_contact")) ?></td>
                        <td><?= htmlentities($prospect->get("date_action")) ?></td>
                        <td><?= htmlentities($prospect->get("statut")) ?></td>
                        <?php 
                        if (($role == "manager" || $role == "admin") && ($prospect->get("statut") != "gagné" || $prospect->get("statut") != "abandonné")) {
                        ?>
                            <td><a href="afficher_appel.php?id=<?= htmlentities($prospect->id()) ?>" class="btn btn-primary">Appel</a></td>
                        <?php
                        }
                        ?>
                        
                    </tr>
                </table>   
            </div> 
            <div class="row">
                <h2 class="text-center">Historique des actions</h2>
                <?php
                if (isset($listeAppels)) {
                    foreach ($listeAppels as $unAppel) {
                        ?>
                        <ul class="list-group my-3">
                            <li class="list-group-item">Début de l'appel: <?= htmlentities($unAppel->get("debut_tel")) ?></li>
                            <li class="list-group-item">Fin de l'appel: <?= htmlentities($unAppel->get("fin_tel")) ?></li>
                            <li class="list-group-item">Commentaires: <?= htmlentities($unAppel->get("commentaire")) ?></li>
                            <li class="list-group-item">Statut: <?= htmlentities($unAppel->get("etat")) ?></li>
                        </ul>
                        <?php
                    }
                }
            ?>
            </div> 
        </main>
    </div>
</body>
</html>
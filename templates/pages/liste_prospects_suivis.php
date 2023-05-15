<?php

/*

Template de page : Mise en page de la liste des prospects suivis

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
    <title>Liste des prospects suivis</title>
</head>
<body>
    <div class="container">
        <?php
        //print_r($_SESSION);
        include "templates/fragments/header.php";
        ?>

        <main>
            <h1 class="text-center text-uppercase">Liste des prospects suivis</h1>
            <?php
            foreach ($listeProspects as $unProspect) {
                ?>
                <ul class="list-group my-3">
                    <li class="list-group-item bg-light">Prospect: <span class="fw-bold"><a href="afficher_detail_prospect.php?id=<?= htmlentities($unProspect->id()) ?>"><?= htmlentities($unProspect->get("raison_sociale")) ?></a></span></li>
                    <li class="list-group-item">Statut: <span class="fw-bold"><?= htmlentities($unProspect->get("statut")) ?></span></li>
                    <?php
                    if (htmlentities($unProspect->get("date_action")) <= date("Y-m-d")) {
                    ?>
                        <li class="list-group-item">Date de la prochaine action: <span class="fw-bold text-danger"><?= implode("/", array_reverse(explode("-", htmlentities($unProspect->get("date_action"))))) ?></span></li>    
                    <?php
                    } else {
                    ?>
                        <li class="list-group-item">Date de la prochaine action: <span class="fw-bold"><?= implode("/", array_reverse(explode("-", htmlentities($unProspect->get("date_action"))))) ?></span></li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
        </main>
    </div>
</body>
</html>

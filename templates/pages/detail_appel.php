<?php

/*

Template : Affichage du formulaire de saisi d'un appel

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
    <title>Nouvel appel</title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Nouvel appel</h1>
            <div class="row">
                <h2>Enregistrement d'un appel :</h2>
                <form action="enregistrer_appel.php?id=<?= $prospect->id() ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Début : <?= $heureAppel ?> </label>
                        <input type="hidden" class="form-control" name="debut_tel" value="<?= $heureAppel ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Commentaire : </label>
                        <textarea name="commentaire" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Statut de l'appel : </label>
                        <select name="etat" id="etat" class="form-select">
                            <option value="absent">Absent</option>
                            <option value="argumente">Argumenté</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Terminer l'appel" />
                </form>
            </div>
            <div class="row">
                <h2>Détail du prospect :</h2>
                <table class="table">
                    <tr>
                        <th scope="col">Raison sociale</th>
                        <th scope="col">Code SIRET</th>
                        <th scope="col">Email de contact</th>
                        <th scope="col">Nom du contact</th>
                        <th scope="col">Date de la prochaine action</th>
                        <th scope="col">Statut</th>
                    </tr>
                    <tr>
                        <td><?= htmlentities($prospect->get("raison_sociale")) ?></td>
                        <td><?= htmlentities($prospect->get("siret")) ?></td>
                        <td><?= htmlentities($prospect->get("email_contact")) ?></td>
                        <td><?= htmlentities($prospect->get("nom_contact")) ?></td>
                        <td><?= htmlentities($prospect->get("date_action")) ?></td>
                        <td><?= htmlentities($prospect->get("statut")) ?></td>
                    </tr>
                </table>   
            </div> 
            <div class="row">
                <h2 class="text-center">Historique des actions</h2>
                <?php
                if (!empty($listeAppels)) {
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
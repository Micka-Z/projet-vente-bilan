<?php

/*

Template : Affichage du détail de l'utilisateur

Paramètres :
    

*/

if (!empty($utilisateur->id())) {
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Détail del'utilisateur <?= $utilisateur->get("nom") ?></title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Détail del'utilisateur <?= $utilisateur->get("nom") ?></h1>
            <table class="table">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Login</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Actif</th>
                    <th scope="col">Action</th>
                </tr>
                <tr>
                    <td><?= htmlentities($utilisateur->get("nom")) ?></td>
                    <td><?= htmlentities($utilisateur->get("login")) ?></td>
                    <td><?= htmlentities($utilisateur->get("role")) ?></td>
                    <td>
                        <?php
                        if (htmlentities($utilisateur->get("actif")) == 1) {
                            echo "OUI";
                        } else 
                        echo "NON";
                        ?>
                     </td>
                    <td><a href="afficher_form_modif_utilisateur.php?id=<?= htmlentities($utilisateur->id()) ?>" class="btn btn-warning">Modifier</a></td>
                </tr>
            </table>          
        </main>
    </div>
</body>
</html>
<?php

/*

Template de page : Mise en page du formulaire de création d'un nouveau prospect

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
    <title>Créer un nouveau prospect</title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Créer un nouveau prospect</h1>
            <form action="creer_prospect.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Raison sociale : </label>
                    <input type="text" maxlength="100" class="form-control" name="raison_sociale" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Code SIRET : </label>
                    <input type="text" maxlength="14" class="form-control" name="siret" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Email de contact : </label>
                    <input type="email" maxlength="100" class="form-control" name="email_contact" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Date de la prochaine action : </label>
                    <input type="date" class="form-control" name="date_action" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Personne à contacter : </label>
                    <input type="text" maxlength="100" class="form-control" name="nom_contact" />
                </div>
                <input type="submit" class="btn btn-primary" value="Envoyer" />
            </form>            
        </main>
    </div>
</body>
</html>
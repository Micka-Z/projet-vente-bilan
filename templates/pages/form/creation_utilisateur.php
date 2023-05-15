<?php

/*

Template de page : Mise en page du formulaire de création d'un nouvel utilisateur

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
    <title>Créer un nouvel utilisateur</title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Créer un nouvel utilisateur</h1>
            <form action="creer_utilisateur.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Nom : </label>
                    <input type="text" maxlength="100" class="form-control" name="nom" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Login : </label>
                    <input type="text" maxlength="100" class="form-control" name="login" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe : </label>
                    <input type="password" maxlength="50" class="form-control" name="password" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Rôle : </label>
                    <select name="role" class="form-select">
                        <option value="assistant">Assistant</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Envoyer" />
            </form>            
        </main>
    </div>
</body>
</html>
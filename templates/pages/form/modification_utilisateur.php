<?php

/*

Template de page : Mise en page du formulaire de modificaton d'un utilisateur

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
    <title>Modification d'un utilisateur</title>
</head>
<body>
    <div class="container">
        <?php
        include "templates/fragments/header.php";
        ?>
        <main>
            <h1 class="text-center text-uppercase">Modification d'un utilisateur</h1>
            <form action="modifier_utilisateur.php?id=<?= $utilisateur->id() ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nom : </label>
                    <input type="text" maxlength="100" class="form-control" name="nom" value="<?= $utilisateur->get("nom") ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Login : </label>
                    <input type="text" maxlength="100" class="form-control" name="login" value="<?= $utilisateur->get("login") ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe : </label>
                    <input type="password" maxlength="50" class="form-control" name="password" value="<?= $utilisateur->get("password") ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Rôle : </label>
                    <select name="role" class="form-select">
                        <option value="assistant">Assistant</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Actif : </label>
                    <div class="form-check">
                        <label class="form-check-label">Oui
                        <input type="radio" class="form-check-input" name="actif" value="1" checked></label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Non
                        <input type="radio" class="form-check-input" name="actif" value="0"></label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Envoyer" />
            </form>            
        </main>
    </div>
</body>
</html>
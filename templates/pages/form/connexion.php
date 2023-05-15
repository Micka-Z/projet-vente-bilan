<?php

/*

Templates de pages : Mise en page du formulaire de connexion

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
    <title>Formulaire de connexion</title>
</head>
<body>
    <div class="container">

            <?php
            include "templates/fragments/header.php";
            ?>

            <main>
                <h1 class="text-center text-uppercase">Formulaire de connexion</h1>
                <form action="connecter.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Login : </label>
                            <input type="text" class="form-control" name="login" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe : </label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Se connecter" />
                </form>
            </main>
    </div>
</body>
</html>
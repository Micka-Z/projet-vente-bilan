<?php

/*

Templates de pages : Mise en page du formulaire du nouveau de statut de prospect

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
    <title>Nouveau statut</title>
</head>
<body>
    <div class="container">

            <?php
            include "templates/fragments/header.php";
            ?>

            <main>
                <h1 class="text-center text-uppercase">Nouveau statut</h1>
                <form action="action_prospect.php?id=<?= $prospect->id() ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Statut : </label>
                            <select name="statut" class="form-select" id="statut">
                                <?php
                                if ($prospect->get("statut") == "à suivre") {
                                    ?>
                                    <option value="gagne">Gagné</option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="asuivre">A suivre</option>
                                    
                                    <?php
                                }
                                ?>
                                <option value="abandonne">Abandonné</option>
                            </select>
                        </div>
                        <div class="mb-3" id="date_action" >
                            <label class="form-label">Date de la prochaine action : </label>
                            <input type="date" class="form-control" name="date_action" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Envoyer" />
                </form>
            </main>
            <script type="text/javascript" src="js/script.js"></script>
    </div>
</body>
</html>
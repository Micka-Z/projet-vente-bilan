<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <div class="nav navbar-nav">
                    <?php
                    if (isConnected()) {
                    ?>
                        <a class="nav-link" href="index.php">Accueil</a>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    //print_r($role);
                    if (!empty($role)) {
                        // Filtre du menu en fonction des rôles de l'utilisateur connecté
                        if ($role == "assistant") {
                        ?>
                            <a class="nav-link active" href="afficher_form_creation_prospect.php">Création de prospect</a>
                        <?php
                        } elseif ($role == "manager") {
                        ?>
                            <a class="nav-link active" href="afficher_form_creation_prospect.php">Création de prospect</a>
                            <a class="nav-link active" href="afficher_suivi_prospects.php">Suivi de prospection</a>
                        <?php                            
                        } elseif ($role == "admin") {
                        ?>
                            <a class="nav-link active" href="afficher_form_creation_prospect.php">Création de prospect</a>
                            <a class="nav-link active" href="afficher_suivi_prospects.php">Suivi de prospection</a>
                            <a class="nav-link active" href="afficher_form_creation_utilisateur.php">Création d'un utilisateur</a>
                            <a class="nav-link active" href="afficher_liste_utilisateurs.php">Liste des utilisateurs</a>
                        <?php
                        }
                    }


                    ?>
                </div>
            </div>
            <div class="nav navbar-nav">
                <?php
                if (isConnected()) {
                ?>
                    <a class="nav-link active" href="deconnecter.php">Deconnexion</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</header>
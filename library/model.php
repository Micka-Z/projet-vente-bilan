<?php

/*

class model : Modèle pour les classes de gestion d'un objet du modèle de base de données

*/

class _model {
    protected $champs = []; // Liste des champs sauf l'id
    protected $table = ""; // Nom de la table dans la base de données
    protected $liens = []; // Liens du type  "nomChamp" => "tablePointee" pour établir le lien entre 2 tables
    protected $id = 0; // Valeur de l'id
    protected $valeurs = []; // Tableau pour stocker les valeurs des champs

    function __construct($id = null) {            // Constructeur : attention il y a 2 _
        // Cette méthode s'exécute automatiquement juste après la création de l'objet
        // Rôle : charger l'objet d'id donné (si on donne un id)
        // Retour : toujours néant
        // Paramètres :
        //      $id : id à charger (optionnel)

        // Si on a un id -non null) à charger
        //      Charger l'objet courant
        if (isset($id)) {
            $this->loadById($id);
        }
    }

    // Méthodes
    function get($nomChamp) {   
        /* Getter d'attributs d'un objet sous la forme getChamps() { return $this->champ }
         Ou getter de liens qui pointe vers un objet 
        getObjet() { 
            $obj = new obj();
            $obj->loadById($this->id_obj);
            
            if ($obj == false) {
                return NULL;
            } else {
                return $obj
            }
        }

        */

        // Rôle : Récupérer la valeur du champ ou l'objet pointé pour les champs qui réprésentent un lien vers un autre objet
        // Retour : la valeur du champ ou "" s'il n'existe pas
        // Paramètres
        //      $nomChamp : nom du champ dont sa valeur est à retourner

        // Vérifier si le champ correspond à un lien (il retourne un objet, pas une valeur donc traitement différent)
        if (isset($this->liens[$nomChamp])) {
            return $this->getLien($nomChamp);
        }

        // SI le champ existe et a une valeur
        if (in_array($nomChamp, $this->champs)) { // Est-ce que le champ $nomChamp se trouve dans le tableau $champs
            // ALORS on retourne la valeur du champ
            return $this->valeurs[$nomChamp];
        } else {
            // SINON on retourne rien
            return "";
        }
    }

    function getLien($nomChamp) {
        // Rôle : récupérer l'objet pointé par le nom du champ de l'objet courant
        // Retour : l'objet pointé, chargé s'il existe, sinon retourner null
        // Paramètres :
        //      $nomChamp : nom du champ dont sa valeur est à retourner (un ojet complet dans ce cas)

        // SI le lien est déjà chargé, on retourne NULL
        if (!isset($this->liens[$nomChamp])) {
            return null;
        }

        /* Modèle
        
        getObjet() { 
            $obj = new obj();
            $obj->loadById($this->id_obj);
            
            if ($obj == false) {
                return NULL;
            } else {
                return $obj
            }
        }
        
        */

        // On récupère la table pointée  (par exemple dans getLocataire() on récupère locataire donc l'objet locataire)
        $obj = $this->liens[$nomChamp];
        // A partir de cette table, on crée l'objet correspondant
        $objet = new $obj();
        // Le lien est un id stocké dans une table pointant vers un objet (dans la table appartement on a un locataire stocké par son id)
        // SI il y a une valeur dans le tableau à l'index $nomChamp
        if (isset($this->valeurs[$nomChamp])) {
            // ALORS on charge l'objet à partir de la valeur récupérée dans le tableau à l'index $nomChamp (la valeur de l'id)
            $objet->loadById($this->valeurs[$nomChamp]);
        }
        // ON retourne l'objet
        return $objet;
    }

    function id() {
        // Rôle : retourner l'id 
        // Retour : valeur de l'id
        // Paramètres : néant
        
        // SI l'id est vide
        if (empty($this->id)) {
            // On retourne 0
            return 0;
        } else {
            // SINON on retourne l'id
            return $this->id;
        }
    }

    function is() {
        // Rôle : Vérifier l'objet est chargé
        // Retour : true si l'objet est chargé, false sinon
        // Paramètres : néant
        
        // SI l'id est vide
        if (empty($this->id)) {
            // ALORS on retourne false
            return false;
        } else {
            // SINON on retourne true
            return true;
        }
    }

    function set($nomChamp, $val) {
        // Rôle : Mettre à jour la valeur de l'attribut du champ défini
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $nomChamp : le nom du champ
        //      $val : la valeur

        /*
        Model
        setChamp($valeur) {
            $this->champ = $valeur
        }
        */

        // SI le nom du champ n'existe pas dans la liste des champs
        if (!in_array($nomChamp, $this->champs)) {
            // ALORS on retourne false
            return false;
        }

        // On met à jour la valeur dont l'index est le nom du champ donné avec la valeur donnée
        $this->valeurs[$nomChamp] = $val;

        // On rtourne true
        return true;
    }

    function chargerInfosDepuisTableau($tableau) {
        // Rôle : charger les valeurs des champs depuis un tableau indexé par les noms de champs
        // Retour : néant
        // Paramètres :
        //      $tableau : le tableau d'informations

        /*
        Model :
        if (isset($tabChamp[$nomChamp])) {
            $this->setChamps($tableau[$nomChamps]);
        }
        */

        // On parcourt le tableau des champs
        foreach ($this->champs as $nomChamp) {
            // SI le tableau avec l'index du champ donné est défini
            if (isset($tableau[$nomChamp])) {
                // ALORS on charge la valeur dans l'objet courant
                $this->set($nomChamp, $tableau[$nomChamp]);
            }
        }
    }

    function loadById($id) {
        // Rôle : charger l'objet avec les informations récupérées depuis la base de données d'après l'id donné
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //  $id : l'id de l'élement que l'on souhaiute charger

        // Vider les valeurs de l'objet et son id
        $this->id = 0;
        $this->valeurs = [];

        // Création de la requête de SELECTION
        // SELECT `id`, `champ1`, `champ2`, ... FROM `table` WHERE `id` = :id 
        // ON crée le début de la requête qui est toujours identique
        $sql = "SELECT `id`";
        // On parcourt la liste des champs
        foreach ($this->champs as $unChamp) {
            $sql .= ", `$unChamp`"; // On fabrique la requête en commençant par la virgule pour ne pas avoir besoin de l'enlever au dernier champ
        }

        // Ajout de la table
        $sql .= " FROM `$this->table` ";
        // Ajout de la condition WHERE
        $sql .= " WHERE `id` = :id";

        $param = [
            ":id" => $id
        ];

        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql, $param);

        // SI la requête retourne false (donc la requête a échouée)
        if ($req == false) {
            return false;
        }

        // Récupération du informations de la base de données
        // Des lignes de données, dont chaque ligne correspond à tous les champs de la requête avec la valeur associée
        // Ici il n'y aura qu'une seule ligne de récupérer
        $lignes = $req->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien de récupérer
        if (empty($lignes)) {
            // On retourne false
            return false;
        } else {
            // SINON (si on a récupéré des informations) on charge l'objet courant avec les informations extraites, il n'y a qu'une seule ligne
            $this->chargerInfosDepuisTableau($lignes[0]); // Les informations se trouvent à la ligne 0
            $this->id = $lignes[0]["id"]; // On récupère l'id
            return true; // On retourne true, tout s'est bien passée
        }
    }

    function executeRequest($sql, $param = []) {
        // Rôle : prépare et exécute une requête sur la base de données
        // Retour : la requête exécutée, false sinon
        // Paramètres :
        //      $sql : le texte de la requête
        //      $param : le tableau des paramètres :xxx

        global $bdd;
        
        // Préparation de la requête
        $req = $bdd->prepare($sql);

        // Exécution de la requête
        // SI l'exécution échoue
        if (!$req->execute($param)) {
            echo "Echec de la requête";
            return false;
        }

        // SI la requête a été bien exécutée, on la retourne
        return $req;
    }

    function getAll() {
        // Récupérer tous les objets de la table
        // Retour : un tableau indexé par les id d'objets du type de cette classe
        // PAramètres néant

        // Création de la requête SELECT
        // SELECT `id`, `champ1`, `champ2`, ... FROM `table`
        $sql = "SELECT `id`";
        // On parcourt la liste des champs
        foreach ($this->champs as $unChamp) {
            $sql .= ", `$unChamp`";
        }

        // On ajoute la table
        $sql .= " FROM `$this->table`";

        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql);

        // SI la requête retourne un tableau vide (donc la requête a échouée) (tableau vide car le retour doit retourner un tableau même si vide, et non pas NULL)
        if ($req == false) {
            return [];
        }

        $lignes = $req->fetchAll(PDO::FETCH_ASSOC);

        // Création du retour
        // On crée le tableau de retour
        $retour = [];
        // POUR CHAQUE ligne récupérée
        foreach ($lignes as $uneLigne) {
            // On crée l'objet dans la classe où l'on se trouve
            // D'abord récupérer la classe courante
            $class = get_class($this);
            // créer e,nsuite l'objet correspondant
            $obj = new $class();                      // Ces deux lignes peuvent être remplacées par $obj = new self()
            // On charge l'objet à partir des informations récupérées
            $obj->chargerInfosDepuisTableau($uneLigne);
            // On enregistre l'id
            $obj->id = $uneLigne["id"];
            // On met en forme le tableau de retour
            $retour[$uneLigne["id"]] = $obj;
        }

        // On retourne le tableau
        return $retour;
    }

    function insert() {
        // Rôle : créer dans la base de données l'objet courant
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Création de la requête
        // INSERT INTO `table` SET `champ1` = :valeur1, `champ2` = :valeur2
        $sql = "INSERT INTO `$this->table` SET ";
        $sql .= $this->construitChamps();

        $param = $this->construitParametresChamps();

        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql, $param);

        // SI la requête retourne false (donc la requête a échouée)
        if ($req == false) {
            // On met à jour l'id à 0
            $this->id = 0;
            return false;
        }

        // On récupère l'id du dernier enregistrement et on le met dans l'objet courant
        global $bdd;

        $this->id = $bdd->lastInsertId();

        return true;
    }

    function update() {
        // Rôle : mettre à jour l'objet courant dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        // UPDATE `table` SET `champ1` = :valeur1, `champ2` = :valeur2 WHERE `id` = :id
        // Construction de la 1ère partie de la requête
        $sql = "UPDATE `$this->table` SET ";
        // Ajout des champs
        $sql .= $this->construitChamps();
        // Construction de la condition WHERE
        $sql .= " WHERE `id` = :id";
        // COnstruction du tableau de paramètres
        $param = $this->construitParametresChamps();
        // On ajoute l'id
        $param["id"] = $this->id;

        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql, $param);

        // SI la requête retourne false (donc la requête a échouée)
        if ($req == false) {
            // On met à jour l'id à 0
            $this->id = 0;
            return false;
        }

        return true;
    }

    function delete() {
        // Rôle : supprimer l'objet courant de la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Création de la requête
        // DELETE FROM `table` WHERE `id` = :id
        $sql = "DELETE FROM `$this->table` WHERE `id` = :id";
        $param = [":id" => $this->id];
        $req = $this->executeRequest($sql, $param);      // ON récupètre une requête exécutée ou false
        // Si c'est bon mettre l'id à 0
        if ($req != false) {
            $this->id = 0;
            return true;
        } else {
            // SINON retourner false
            return false;
        }

    }

    function construitChamps() {
        // Rôle : Construire le morceau de requeête `champ1` = :valeur1 (ou par exemple `nom` = :nom), `champ2` = :valeur2 (pour utilisaton dans INSERT et UPDATE)
        // Retour : le tableau
        // Paramètres : néant

        // On crée le tableau de retour
        $retour = [];
        // ON parcourt la liste des champs
        foreach ($this->champs as $unChamp) {
            // On crée la ligne pour champ de la requête
            $retour[] = "`$unChamp` = :$unChamp";
        }

        // On trasnforme le tableau de retour en une chaîne de retour 
        return implode(", ", $retour);
    }

    function construitParametresChamps() {
        // Rôle : Construire la liste des paramètres --> [":champ1" => $champ1, ":champ2" => $champ2]
        // Retour : le tableau
        // Paramètres : néant

        // On crée le tableau de retour
        $retour = [];

        // On parcourt la liste des champs
        foreach($this->champs as $unChamp) {
            // SI la valeur existe
            if(isset($this->valeurs[$unChamp])) {
                // ALORS on enregistre la valeur de l'index champ dans le tableau de retour à l'index ":champ"
                $retour[":$unChamp"] = $this->valeurs[$unChamp];
            } else {
                // SINON on enregistre null
                $retour["$unChamp"] = null;
            }
        }
        // On retourne le tableau
        return $retour;
    }

    function loadByLogin($login) {
        // Rôle : chargement de l'objet courant avec un login donné
        // Retour : true si on a trouvé, false sinon
        // Paramètres :
        //      $login : login recherché
    
        // Vider les valeurs de l'objet et son id
        $this->id = 0;
        $this->valeurs = [];

        // Création de la requête de SELECTION
        // SELECT `id`, `champ1`, `champ2`, ... FROM `table` WHERE `id` = :id 
        // ON crée le début de la requête qui est toujours identique
        $sql = "SELECT `id`";
        // On parcourt la liste des champs
        foreach ($this->champs as $unChamp) {
            $sql .= ", `$unChamp`"; // On fabrique la requête en commençant par la virgule pour ne pas avoir besoin de l'enlever au dernier champ
        }

        // Ajout de la table
        $sql .= "FROM `$this->table` ";
        // Ajout de la condition WHERE
        $sql .= " WHERE `login` = :login";

        $param = [
            ":login" => $login
        ];

        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql, $param);

        // SI la requête retourne false (donc la requête a échouée)
        if ($req == false) {
            return false;
        }

        // Récupération du informations de la base de données
        // Des lignes de données, dont chaque ligne correspond à tous les champs de la requête avec la valeur associée
        // Ici il n'y aura qu'une seule ligne de récupérer
        $lignes = $req->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien de récupérer
        if (empty($lignes)) {
            // On retourne false
            return false;
        } else {
            // SINON (si on a récupéré des informations) on charge l'objet courant avec les informations extraites, il n'y a qu'une seule ligne
            $this->chargerInfosDepuisTableau($lignes[0]); // Les informations se trouvent à la ligne 0
            $this->id = $lignes[0]["id"]; // On récupère le login
            return true; // On retourne true, tout s'est bien passée
        }

    }
}

?>



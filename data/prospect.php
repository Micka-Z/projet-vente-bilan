<?php 

/*

classe `PROSPECT` : classe de gestion de l'objet prospect

Hérité de la classe `MODEL`
*/

class prospect extends _model {

    // Attributs
    protected $champs = ["raison_sociale", "siret", "email_contact", "nom_contact", "date_action", "statut"]; // Liste des champs représentant le prospect dans la BDD
    protected $table = "prospect"; // Table `prospect`

    function getAllQS() {
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

        // Ajout de la condition WHERE pour filtrer les prospects "A qualifier" et "A Suivre"
        $sql .= " WHERE `statut` = :qualifier OR `statut` = :suivre";
        $sql .= " ORDER BY `date_action` ASC";
        $param = [":qualifier" => "à qualifier", ":suivre" => "à suivre"];
        // Exécution de la requête et récupération du résultat
        $req = $this->executeRequest($sql, $param);

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
}

?>
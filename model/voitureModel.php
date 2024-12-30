<?php
require_once("BD.php");

class VoitureModel {
    private $immatriculation;
    private $marque;
    private $kilometrage;

    public function __construct(string $immatriculation = "", string $marque = "", int $kilometrage = 0) {
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->kilometrage = $kilometrage;
    }

    public function getImmatriculation() { return $this->immatriculation; }
    public function getMarque() { return strtoupper($this->marque); }
    public function getKilometrage() { return $this->kilometrage; }
    
    
    public function setImmatriculation($imma)
    {
        $this->immatriculation = $imma;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;
    }

    public static function getAllVoitures() {
        $sql = "SELECT * FROM voiture";
        $stm = Model::executerRequete($sql);
        return $stm->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "VoitureModel");
    }

    public static function getVoitureByMarque(string $chaine): array
    {
        $sql = "SELECT * FROM voiture WHERE marque LIKE ?";
        $stm = Model::executerRequete($sql, ["%$chaine%"]);
 
        $result = $stm->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "VoitureModel");
 
        return $result;
    }

    public function ajouter()
    {
        $sql = "INSERT INTO voiture (immatriculation, marque, kilometrage) 
            VALUES (:imma, :marque, :kilometrage)";
    
        // Tableau des paramètres à lier à la requête
        $params = [
            ':imma' => $this->immatriculation,
            ':marque' => $this->marque,
            ':kilometrage' => $this->kilometrage
        ];
        //Créer et exécuter la requête sql permettant d'ajouter la voiture en cours à la base de données
        $flag = Model::executerRequete($sql, $params);
        return $flag;
    }
    public function delete($Immatriculation)
    {
        // Requête SQL pour supprimer une voiture par son ID
        $sql = "DELETE FROM voiture WHERE immatriculation = :Immatriculation";

        // Paramètres pour la requête
        $params = [':Immatriculation' => $Immatriculation];

        // Exécuter la requête via Model::executerRequete
        return Model::executerRequete($sql, $params);
    }

    public function update($Immatriculation)
    {
        // Requête SQL pour mettre à jour une voiture par son ID
        $sql = "UPDATE voiture
                SET immatriculation = :imma, marque = :marque, kilometrage = :kilometrage 
                WHERE immatriculation = :immatriculation";

        // Tableau des paramètres
        $params = [
            ':imma' => $this->immatriculation,
            ':marque' => $this->marque,
            ':kilometrage' => $this->kilometrage,
            ':immatriculation' => $Immatriculation
        ];

        // Exécuter la requête via Model::executerRequete
        return Model::executerRequete($sql, $params);
    }
    public static function getById($immatriculation) {
        
        $sql = "SELECT * FROM voiture WHERE immatriculation = :immatriculation";
        $params = [':immatriculation' => $immatriculation];
        $result = Model::executerRequete($sql, $params);
    
        // Vérifie si la requête retourne une ligne
        if ($result->rowCount() === 1) {
            return $result->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif
        }
        return null; // Retourne null si aucune voiture n'est trouvée
    }
    


}

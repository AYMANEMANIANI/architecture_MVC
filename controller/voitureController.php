<?php
require_once("model/VoitureModel.php");

class VoitureController {
    public static function getAll() {
        $tab_voitures = VoitureModel::getAllVoitures();
        require('view/listVoitures.php');
    }
    public static function getByMarque($marque)
    {
        $tab_voitures = VoitureModel::getVoitureByMarque($marque);
    //Appeler le modèle pour récupérer les voitures dont une partie de la marque contient la chaine $marque
        require('view/listVoitures.php');  //affichage de la vue
    }

    //Pour l'affichage du formulaire de création d'une nouvelle voiture
    public static function create()
    {
        require('view/createView.php');
    }
    //Enregister la nouvelle voiture dans la base de données
    public static function enregister($imma, $marque, $kilometrage)
    {
    //Créer un objet de la classe voitureModelen initialisant ses attributs par les //valeurs passées à la méthode enregistrer
        $voiture = new VoitureModel();
        $voiture->setImmatriculation($imma);
        $voiture->setMarque($marque);
        $voiture->setKilometrage($kilometrage);
    //Appler la méthode ajouter de la classe voitureModele, si l’ajour réussisse, //on réaffiche la page index.php
        if ($voiture->ajouter()) {
            // Si l'ajout réussit, rediriger vers la page index.php
            header('Location: index.php');
            exit();
        } else {
            // Si l'ajout échoue, afficher un message d'erreur
            echo "Erreur : Impossible d'enregistrer la voiture.";
        }
    }

    // public static function delete($imma)
    // {
    //     require('view/listVoitures.php');  //affichage de la vue
    // }
    public static function delete($imma)
    {
        // Créer une instance de VoitureModel
        $voiture = new VoitureModel();

        // Appeler la méthode supprimer
        if ($voiture->delete($imma)) {
            // Rediriger vers la page d'index après suppression
            header('Location: index.php');
            exit();
        } else {
            // Afficher un message d'erreur si la suppression échoue
            echo "Erreur : Impossible de supprimer la voiture.";
        }
    }
    public static function update($immatriculation)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $imma = $_POST['immatriculation'];
            $marque = $_POST['marque'];
            $kilometrage = $_POST['kilometrage'];
    
            // Créer une instance de VoitureModel
            $voiture = new VoitureModel();
            $voiture->setImmatriculation($imma);
            $voiture->setMarque($marque);
            $voiture->setKilometrage($kilometrage);
    
            // Appeler la méthode de mise à jour
            if ($voiture->update($immatriculation)) {
                // Rediriger vers la liste des voitures après succès
                header('Location: index.php');
                exit();
            } else {
                echo "Erreur : Impossible de mettre à jour la voiture.";
            }
        } else {
            // Charger les données existantes pour affichage dans le formulaire
            $voiture = VoitureModel::getById($immatriculation);
            require('view/updateView.php');
        }
    }
    


}
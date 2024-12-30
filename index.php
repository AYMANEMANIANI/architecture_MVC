
<?php
    require_once 'controller/VoitureController.php';
    if (isset($_GET["action"])) {
        // On récupère l'action passée dans l'URL
        $action = $_GET["action"];

        switch ($action) {
            case "rechercher":
                if (isset($_POST["marque"]))
                    VoitureController::getByMarque($_POST["marque"]);
                break;
            case "create":
                //Appler la méthode create du contrôleur VoitureController
                VoitureController::create();
                break;
            case "ajouter":
                // ???
                if (isset($_POST["immatriculation"]) && isset($_POST["marque"]) && isset($_POST["kilometrage"])) {
                //Appeler la méthode enregister du contrôleur VoitureController en lui passant les valeurs nécessaires 
                    VoitureController::enregister($_POST["immatriculation"], $_POST["marque"], $_POST["kilometrage"]);
                }
            case "delete":
                if (isset($_GET["Immatriculation"])) {
                    VoitureController::delete($_GET["Immatriculation"]);
                }
            case "update":
                if (isset($_GET["Immatriculation"])) {
                    VoitureController::update($_GET["Immatriculation"]);
                }
        }
    } else {
        VoitureController::getAll();
    }

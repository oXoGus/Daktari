<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['adresse_site_web']) && isset($_GET['IBAN']) && isset($_GET['code'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/modifierEntreprise.php");

    }     
    
    if (isset($_GET['id']) && !empty($_GET['id'])){
        
        // on récup les info de l'entreprise
        $entrepriseInfo = $cnx->prepare("SELECT nom, adresse, telephone, mail, adresse_site_web, IBAN, code FROM professionnel NATURAL JOIN responsable WHERE id = :id");
        $entrepriseInfo->execute(["id" => (int) $_GET['id']]);
        $entrepriseInfo = $entrepriseInfo->fetch(PDO::FETCH_OBJ);

         // on récupère la liste des type d'entreprises
        $res = $cnx->query("SELECT * FROM type_professionnel");
        
        $typeList = array();
        while ($type = $res->fetch(PDO::FETCH_OBJ)) {
            $typeList[$type->code] = $type->libelle;
        }


    } else {
        header('location: rechercherEntreprise.php');
        exit;
    }

    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/modifierEntreprise.php");
?>

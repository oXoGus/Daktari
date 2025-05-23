<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['nom']) && isset($_GET['adresse']) && isset($_GET['telephone']) && isset($_GET['mail']) && isset($_GET['date_de_naissance']) && isset($_GET['prenom'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/modifierParticulier.php");

    }     
    
    if (isset($_GET['id']) && !empty($_GET['id'])){
        
        // on récup les info de l'entreprise
        $particulierInfo = $cnx->prepare("SELECT nom, adresse, telephone, mail, prenom, date_de_naissance FROM particulier NATURAL JOIN responsable WHERE id = :id");
        $particulierInfo->execute(["id" => (int) $_GET['id']]);
        $particulierInfo = $particulierInfo->fetch(PDO::FETCH_OBJ);

        // pas d'entreprise trouvé 
        if ($particulierInfo == false){
            header("location: ".(isset($_SESSION['rechercheParam']) ? $_SESSION['rechercheParam'] : "rechercherParticulier.php"));   
            exit;
        }



    } else {
        header('location: rechercherParticulier.php');
        exit;
    }

    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/modifierParticulier.php");
?>

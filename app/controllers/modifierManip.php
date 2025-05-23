<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // si l'utilisateur à envoyé le form 
    if (isset($_GET['code']) && isset($_GET['tarif']) && isset($_GET['duree'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/modifierManip.php");

    }     
    
    if (isset($_GET['code']) && !empty($_GET['code'])){
        
        // on récup les info de l'entreprise
        $manipInfoQuery = $cnx->prepare("SELECT code, tarif, duree FROM manipulation WHERE code = :code");
        $manipInfoQuery->execute(["code" => $_GET['code']]);
        $manipInfo = $manipInfoQuery->fetch(PDO::FETCH_OBJ);
        
        // aucune manip correspondant
        if ($manipInfoQuery->rowCount() == 0){
            header("location: ".(isset($_SESSION['rechercheParam']) ? $_SESSION['rechercheParam'] : "rechercherManip.php"));   
            exit;
        }
        // on affiche ensuite la page dynamique 
        include($originDir."/app/views/modifierManip.php");
    } else {
        header('location: rechercherManip.php');
        exit;
    }

    
?>

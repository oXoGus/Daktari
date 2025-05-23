<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

    // on récupère le l'url pour pouvoir revenir a cette recherche avec ces param
    $_SESSION['rechercheParam'] = $_SERVER['PHP_SELF'].(isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "").$_SERVER['QUERY_STRING']."#result";
        
    
    // si l'utilisateur à envoyé le form 
    if (isset($_GET['code']) && isset($_GET['tarif']) && isset($_GET['duree'])){
        
        // on appel la partie modèle pour ajouter les données dans la base de donnée
        include($originDir."/app/models/rechercherManip.php");

    } else {

        // par défaut
        $manipTrouve = $cnx->query("SELECT code, ROUND(tarif/100, 0) tarif, duree FROM manipulation");
    }

    $manipTrouveLst = array();
            
    // on met tout dans une liste
    while ($manip = $manipTrouve->fetch(PDO::FETCH_OBJ)){
        $manipTrouveLst[$manip->code] = $manip;
    }
    
    // on affiche ensuite la page dynamique 
    include($originDir."/app/views/rechercherManip.php");
?>

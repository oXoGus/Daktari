<?php 
    include($originDir."/config/middleware.php"); // page uniquement accèssible aux utilisateurs

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

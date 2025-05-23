<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
   
    if (isset($_GET['id'])){
        if (isset($_GET['usernamemodif'])){  
            include($originDir."/app/models/UPDATEUtilisateur.php");
        }

        // on fait la requete après avoir modifier pour qu'on affiche les donné modifier
        $resMU = $cnx ->query('SELECT username FROM user_db where id='.$_GET['id']);

        $usernameMU = $resMU->fetchAll(PDO::FETCH_OBJ);
        include($originDir."/app/views/modifierUtilisateur.php");
    } else {
        header('location: rechercherUtilisateur.php');
        exit;
    }
?>

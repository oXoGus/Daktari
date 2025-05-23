<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    
    // on récupère le l'url pour pouvoir revenir a cette recherche avec ces param
    $_SESSION['rechercheParam'] = $_SERVER['PHP_SELF'].(isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "").$_SERVER['QUERY_STRING']."#result";
            
    $rechercherUtilisateur=array();
    $param = [];
    if (isset($_GET['username']) && !empty($_GET["username"])) {
        $param[':username']=$_GET['username'].'%';
        $reqRU = "WHERE username LIKE :username";

        include($originDir."/app/models/rechercherUtilisateur.php");
    } else {
        $resRU = $cnx->query("SELECT * FROM user_db");
    }
    

    include($originDir."/app/views/rechercherUtilisateur.php");
?>
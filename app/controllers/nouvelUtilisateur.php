<?php 
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    if (isset($_GET["username"]) &&  isset($_GET["mdp"]) && !empty($_GET["username"]) && !empty($_GET["mdp"])) {

        // uniquement Daktari peu ajouter des utilisateurs pour des raisons de sécurité
        $res = $cnx->query("SELECT * FROM user_db where username = 'daktari' and password_hash = ".$cnx->quote($mdp));
        
        // si il y'a bien un utilisateur correspondant au login et au mdp
        if ($res->fetch(PDO::FETCH_OBJ)){
            include($originDir."/app/models/nouvelUtilisateur.php");
        }
        else {
            $err = "seul daktari peut ajojuter des utilisateurs";
        }
    }
    include($originDir."/app/views/nouvelUtilisateur.php");
?>

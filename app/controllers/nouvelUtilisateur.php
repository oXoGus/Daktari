<?php 
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    if (!empty($_GET["username"]) && !empty($_GET["mdp"])) {
        $addUser="INSERT INTO user_db (username, password_hash) VALUES ('".$_GET['username']."', md5('".$_GET['mdp']."'))";
        include($originDir."/app/models/nouvelUtilisateur.php");
    }
    include($originDir."/app/views/nouvelUtilisateur.php");
?>

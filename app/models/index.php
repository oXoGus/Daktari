<?php

    //on essaye de se connecter à la base de données
    include($oringinDir.'/config/connexion_db.php');

    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $res = $cnx->query("SELECT * FROM user_db where login = ".$cnx->quote($login)." and mpd = md5(".$cnx->quote($mdp).")");
    //on renvoit le resultat obtenu au controleur
?>
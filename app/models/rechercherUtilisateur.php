<?php

//on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $sqlRU ="SELECT id, username FROM user_db ".$reqRU;
    $requeteRU = $cnx->prepare($sqlRU);
    $requeteRU->execute($param);
    $resRU=$requeteRU;
    //on renvoit le resultat obtenu au controleur
?>
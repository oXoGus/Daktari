<?php

//on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $sqlRT ="SELECT id, produit, dilution, dose, duree_traitement, frequence, quand FROM traitement $reqRT";
    $requeteRT = $cnx->prepare($sqlRT);
    $requeteRT->execute($parametre);
    $resRT=$requeteRT;
    //on renvoit le resultat obtenu au controleur
?>
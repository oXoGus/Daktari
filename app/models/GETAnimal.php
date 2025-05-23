<?php

//on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    
    $sqlMA ="SELECT a.id as id, b.nom as responsable, a.nom as nom, a.espece as espece, a.race as race, a.genre as genre, a.taille as taille, a.poids as poids, a.castre as castre, a.id_responsable as id_responsable FROM animaux a, responsable b WHERE a.id_responsable=b.id AND a.id=:id";
    $requeteMA = $cnx->prepare($sqlMA);
    $requeteMA->execute([':id'=>$aID]);
    $resMA=$requeteMA;
    //on renvoit le resultat obtenu au controleur
?>
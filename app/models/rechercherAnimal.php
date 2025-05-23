<?php

    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $sql ="SELECT a.id as id, b.nom as responsable, a.nom as nom, a.espece as espece, a.race as race, a.genre as genre, a.taille as taille FROM animaux a JOIN responsable b ON a.id_responsable = b.id $req";
    echo $sql;
    try {
        $requete = $cnx->prepare($sql);
        $requete->execute($parametres);
        $res=$requete;
        echo $res->rowCount();
        print_r($parametres);
    } catch (PDOException $e){
        $err = $e;
    }
    

    //on renvoit le resultat obtenu au controleur
?>
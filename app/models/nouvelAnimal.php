<?php
    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');
    
    // on créer la chaine pour l'insertion,
    $inputAnimal="('";
    $sep = "";
    foreach ($nouvelAnimal as $cle => $val){
        $inputAnimal .= $sep . $cle;
        $sep = ", ";
    }
    $inputAnimal .= ")";

    $animalAdd = $cnx->prepare("INSERT INTO animaux (nom, espece, race, genre, castre, taille, poids, id_responsable)  VALUES (nom = :nom , espece = :espece , race = :race , genre = :genre , castre = :castre , taille = :taille , poids = :poids , id_responsable = :id_responsable) RETURNING id");
    $animalAdd->
    var_dump($animalAdd);
    //on renvoit le resultat obtenu au controleur
?>
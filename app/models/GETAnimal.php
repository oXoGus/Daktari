<?php

try {
//on essaye de se connecter à la base de données

    include($originDir.'/config/connexion_db.php');
    //On fait une requête de vérification pour savoir si le login et le mdp existe
    //On récupère le hash
    $sqlMA ="SELECT a.id as id, b.nom as responsable, a.nom as nom, a.espece as espece, a.race as race, a.genre as genre, a.taille as taille, a.poids as poids, a.castre as castre, a.id_responsable as id_responsable FROM animaux a, responsable b WHERE a.id_responsable=b.id AND a.id=:id";
    echo $aID;
    $requeteMA = $cnx->prepare($sqlMA);
    $requeteMA->execute([':id'=>$aID]);
    $resMA=$requeteMA;
    //on renvoit le resultat obtenu au controleur
} catch (Exception $e) {
    echo "Une erreur est survenue. L'animal cherché n'est pas accessible pour le moment Veuillez réessayer";
}
?>
<?php
try {
    //on essaye de se connecter à la base de données
    include($originDir.'/config/connexion_db.php');

    $sqlRT ="SELECT id, produit, dilution, dose, duree_traitement, frequence, quand FROM traitement $reqRT";
    $requeteRT = $cnx->prepare($sqlRT);
    $requeteRT->execute($parametre);
    $resRT=$requeteRT;
    //on renvoit le resultat obtenu au controleur
} catch (Exception $e) {
    echo "Une erreur est survenue. Veuillez vérifier que les champs rentrés ne contiennent pas de caractères spéciaux. Veuillez reessayer.";
}
?>
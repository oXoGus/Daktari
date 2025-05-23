<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resMT = $cnx ->query('SELECT produit, dilution, dose, duree_traitement, frequence, quand FROM traitement where id='.$tID);
} catch (Exception $e) {
    echo "Une erreur est survenue. Le traitement n'est pas accessible pour le moment. Veuillez reessayer.";
}
?>
<?php
    include($originDir.'/config/connexion_db.php');
    $resMT = $cnx ->query('SELECT produit, dilution, dose, duree_traitement, frequence, quand FROM traitement where id='.$tID);
?>
<?php
    include($originDir.'/config/connexion_db.php');
    $resVaccinAnimal = $cnx ->query("SELECT animal_id, nom_vaccin from vacciner where animal_id = $aID");
?>
<?php
try {
    include($originDir.'/config/connexion_db.php');
    $resVaccinAnimal = $cnx ->query("SELECT animal_id, nom_vaccin from vacciner where animal_id = $aID");
} catch (Exception $e) {
    echo "Une erreur est survenue. Le vaccin n'est pas accessible pour le moment. Veuillez reessayer.";
}
?>
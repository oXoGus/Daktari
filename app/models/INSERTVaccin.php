<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $inputVacc = $cnx ->query($inputVaccin);
        $msg = "le vaccin a bien été ajouté ";
    } catch (PDOException $e) {
        $err = $e->getMessage();
    } 
?>
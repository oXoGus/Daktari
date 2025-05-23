<?php
    include($originDir.'/config/connexion_db.php');
    try {
        $addT = $cnx -> exec($inputTraitement);
        $msg = "le traitement a bien été ajouté";
    } catch (PDOException $e) {
        $err = $e->getMessage();
    }
?>
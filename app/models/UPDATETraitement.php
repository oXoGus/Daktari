<?php
    include($originDir.'/config/connexion_db.php');
    $resUT = $cnx ->query("UPDATE traitement SET ".$reqUT." WHERE id=".$_GET['id']);
?>
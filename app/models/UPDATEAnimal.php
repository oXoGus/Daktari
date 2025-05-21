<?php
    include($originDir.'/config/connexion_db.php');
    $resUA = $cnx ->prepare("UPDATE animaux SET ".$reqUA." WHERE id=".$_GET['id']);
    $resUA -> execute($parametresA);
?>
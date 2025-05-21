<?php
    include($originDir.'/config/connexion_db.php');
    $resResp = $cnx ->query('SELECT id, nom FROM responsable GROUP BY id');
?>
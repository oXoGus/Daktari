<?php
    include($originDir.'/config/connexion_db.php');
    $resVaccins = $cnx ->query('SELECT nom_vaccin FROM vaccins');
?>